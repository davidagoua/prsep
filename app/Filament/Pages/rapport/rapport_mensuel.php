<?php

namespace App\Filament\Pages\rapport;

use App\Models\RapportMensuel;
use Faker\Core\File;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;

class rapport_mensuel extends Page implements  HasTable
{

    use InteractsWithTable;

    protected static ?string $navigationGroup = 'Rapportage';
    protected static ?string $title = 'Rapport Mensuel';
    protected static string $view = 'filament.pages.rapport.rapport_mensuel';

    public function getTableQuery()
    {
        return RapportMensuel::query()
            ->when(request()->user()->hasRole('validateur'), function($query) {
                $query->whereStatus('10');
            })
            ->when(request()->user()->hasRole('initiateur'), function($query) {
                $query->whereStatus('0');
            });
    }

    public function getHeaderActions(): array
    {
        return [
            Action::make('ajouter')
                ->form([
                    TextInput::make('titre'),
                    FileUpload::make('file')->label("Fichier")
                ])
                ->action(function($data){
                    RapportMensuel::create([
                        'titre' => $data['titre'],
                        'file' => $data['file'],
                        'user_id' => request()->user()->id,
                    ]);

                    Notification::make()->success()->title("Rapport Chargé")->send();
                })
        ];
    }

    public function getTableColumns(): array
    {
        return [
            TextColumn::make('titre')
                ->label('Titre')
                ->searchable(),
            TextColumn::make('status')
                ->label('Status')
                ->badge()
                ->searchable(),
        ];
    }

    public function getTableActions(): array
    {
        return [
          \Filament\Tables\Actions\Action::make('exporter')
            ->action(function($record){
                return response()->download($record->file, $record->titre.'docx');
            }),
            \Filament\Tables\Actions\Action::make('importer')
                ->action(function($record){
                    return response()->download($record->file, $record->titre.'docx');
                })
                ->icon("")
                ->form([
                    FileUpload::make('file')->label("Fichier")
                ]),
            \Filament\Tables\Actions\Action::make('soumettre')
                ->button()
                ->action(function($record){
                    return response()->download($record->file, $record->titre.'docx');
                })
        ];
    }
}
