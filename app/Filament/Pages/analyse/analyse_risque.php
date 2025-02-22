<?php

namespace App\Filament\Pages\analyse;

use App\Models\AnalyseRisque; // Assuming you have a model for Risk analysis
use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;

class analyse_risque extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $title = "Analyses risque";
    protected static ?string $navigationGroup = "Analyses";
    protected static ?string $navigationLabel = "Analyses risque";
    protected static string $view = 'filament.pages.analyse.analyse_risque';

    public function getTableQuery()
    {
        return AnalyseRisque::query(); // Adjust the model as necessary
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Ajouter')
                ->label('Ajouter')
                ->form([
                    RichEditor::make('risk_content')->label('Contenu Risque'),
                ])
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('risk_content')->label('Contenu Risque'),
        ];
    }
}
