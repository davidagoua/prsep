<?php

namespace App\Filament\Pages\planification;

use App\Models\Rld;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Grouping\Group;

class ptba_details extends Page implements HasTable
{

    use InteractsWithTable;
    protected static ?string $title = "Details PTBA";
    protected static bool $shouldRegisterNavigation = false;
    protected static string $view = 'filament.pages.planification.ptba_details';

    public \App\Models\Ptba $ptba;
    public function mount()
    {
        $this->ptba = \App\Models\Ptba::query()->find(request('id'));
    }

    public function getTableQuery()
    {
        return Rld::query()->where('ptba_id', $this->ptba->id);
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
}
