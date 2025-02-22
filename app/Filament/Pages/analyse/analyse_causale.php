<?php

namespace App\Filament\Pages\analyse;

use App\Models\CausalAnalysis;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;

class analyse_causale extends Page implements HasTable
{

    use InteractsWithTable;
    protected static ?string $title = "Analyses causale";
    protected static ?string $navigationGroup = "Analyses";
    protected static ?string $navigationLabel = "Analyses causale";
    protected static string $view = 'filament.pages.analyse.analyse_causale';

    public function getTableQuery()
    {
        return CausalAnalysis::query();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Importer')
                ->label('Importer')
                ->form([
                    FileUpload::make('file')
                ]),
            Action::make('Ajouter')
                ->label('Ajouter')
                ->form([
                    Select::make('central_issue')->label('Problème Central')->options([]),
                    RichEditor::make('causes_immediate'),
                    RichEditor::make('causes_sjacent')->label("Cause Sous-jacente"),
                    RichEditor::make('causes_struct')->label("Cause Sous-jacente"),
                    RichEditor::make('consequence')->label("Cause Sous-jacente"),
                ])
        ];
    }

    protected function getTableColumns(): array
    {
        return [
          TextColumn::make('id')
        ];
    }
}
