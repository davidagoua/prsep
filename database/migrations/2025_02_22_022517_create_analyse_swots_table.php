<?php

namespace App\Filament\Pages\analyse;

use App\Models\EquityAnalysis; // Assuming you have a model for Equity analysis
use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;

class analyse_equite extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $title = "Analyses équité";
    protected static ?string $navigationGroup = "Analyses";
    protected static ?string $navigationLabel = "Analyses équité";
    protected static string $view = 'filament.pages.analyse.analyse_equite';

    public function getTableQuery()
    {
        return EquityAnalysis::query(); // Adjust the model as necessary
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Ajouter')
                ->label('Ajouter')
                ->form([
                    RichEditor::make('equity_content')->label('Contenu Équité'),
                ])
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('equity_content')->label('Contenu Équité'),
        ];
    }
}
