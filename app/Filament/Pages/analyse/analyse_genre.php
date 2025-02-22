<?php

namespace App\Filament\Pages\analyse;

use App\Models\AnalyseGenre; // Assuming you have a model for Genre analysis
use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;

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

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Ajouter')
                ->label('Ajouter')
                ->form([
                    RichEditor::make('genre_content')->label('Contenu Genre'),
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
