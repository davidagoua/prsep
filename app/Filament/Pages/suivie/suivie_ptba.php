<?php

namespace App\Filament\Pages\suivie;

use App\Models\Rld;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Grouping\Group;


class suivie_ptba extends Page implements HasTable
{

    use InteractsWithTable;

    protected static ?string $navigationGroup = "Suivie & Evaluation";
    protected static ?string $navigationLabel = "Suivie PTBA";
    protected static ?string $title = "Suivie PTBA";


    protected static string $view = 'filament.pages.suivie.suivie_ptba';

    public function getTableQuery()
    {
        return Rld::query();
    }

    public function getTableColumns(): array
    {
        return [
            TextColumn::make('titre')->words(10),
            TextColumn::make('zone')->badge()->separator(','),
            TextColumn::make('montant'),
            TextColumn::make('categorie')
                ->label("Categorie"),
            TextColumn::make('date_debut'),
            TextColumn::make('date_fin'),
            TextColumn::make('status')->badge()

        ];
    }

    public function getTableGrouping(): Group
    {
        return Group::make('ild.titre');
    }

    public function getTableActions(): array
    {
        return [
            Action::make('decaissement')
                ->button()
                ->form([
                    TextInput::make('montant')->numeric()->label("Montant"),
                ])
                ->label("Ajouter un decaissement")
        ];
    }
}
