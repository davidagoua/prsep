<?php

namespace App\Filament\Pages\analyse;

use App\Models\AnalyseSwot; // Assuming you have a model for SWOT analysis
use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;

class analyse_swot extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $title = "Analyses SWOT";
    protected static ?string $navigationGroup = "Analyses";
    protected static ?string $navigationLabel = "Analyses SWOT";
    protected static string $view = 'filament.pages.analyse.analyse_swot';

    public function getTableQuery()
    {
        return AnalyseSwot::query(); // Adjust the model as necessary
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Ajouter')
                ->label('Ajouter')
                ->form([
                    RichEditor::make('swot_content')->label('Contenu SWOT'),
                ])
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('swot_content')->label('Contenu SWOT'),
        ];
    }
}
