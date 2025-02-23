<?php

namespace App\Filament\Pages\analyse;

use App\Models\AnalyseGenre; // Assuming you have a model for Genre analysis
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Spatie\SimpleExcel\SimpleExcelReader;

class analyse_genre extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $title = "Analyses genre";
    protected static ?string $navigationGroup = "Analyses";
    protected static ?string $navigationLabel = "Analyses genre";
    protected static string $view = 'filament.pages.analyse.analyse_genre';

    public function getTableQuery()
    {
        return AnalyseGenre::query(); // Adjust the model as necessary
    }

    public static function getNavigationBadge(): ?string
    {
        return AnalyseGenre::query()->count(); // TODO: Change the autogenerated stub
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Importer')
                ->label('Importer')
                ->action(function($data){
                    $rows = SimpleExcelReader::create(storage_path('app/public/'.$data['file']))->getRows();
                    foreach ($rows->toArray() as $row) {
                        AnalyseGenre::create([
                            'central_issue_id'=>null,
                            'causes_immediate'=>$row['CAUSES IMMEDIATES'],
                            'causes_sjacent'=>$row['CAUSES SOUS-JASCENTES'],
                            'causes_struct'=>$row['CAUSES STRUCTURELLES'],
                            'consequence'=>$row['CONSEQUENCES'],
                        ]);
                    }

                    Notification::make()
                        ->title("Fichier importé")
                        ->success()
                        ->send();
                })
                ->form([
                    FileUpload::make('file')
                ]),
            Action::make('Ajouter')
                ->label('Ajouter')
                ->action(function($data){
                    (new AnalyseEquite())->fill($data)->save();
                    Notification::make()->title("Analyse enregistrée")->success()->send();
                })
                ->form([
                    Select::make('categorie')->options([
                        'APPRENANTS '=>'APPRENANTS ','ENSEIGNANTS'=>'ENSEIGNANTS',
                        "PERSONNEL D’ENCADREMENT"=>"PERSONNEL D’ENCADREMENT",
                        'PERSONNEL ADMINISTRATIF'=>'PERSONNEL ADMINISTRATIF ',
                    ]),
                    RichEditor::make('description')->label("Description de la disârité"),
                    RichEditor::make('cause')->label("Causes"),
                    RichEditor::make('solutions')->label("Solutions"),
                ])
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('genre_content')->label('Contenu Genre'),
        ];
    }
}
