<?php

namespace App\Filament\Pages\suivie;

use App\Models\Decaissement;
use App\Models\Rld;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Grouping\Group;
use Illuminate\View\View;


class suivie_ptba extends Page implements HasTable
{

    use InteractsWithTable;

    protected static ?string $navigationGroup = "Suivi & Evaluation";
    protected static ?string $navigationLabel = "Suivi  PTBA";
    protected static ?string $title = "Suivi PTBA";


    protected static string $view = 'filament.pages.suivie.suivie_ptba';

    public function getTableQuery()
    {
        return Rld::query();
    }

    public function getTableColumns(): array
    {
        return [
            TextColumn::make('titre')->words(10),
            //TextColumn::make('zone')->badge()->separator(','),
            TextColumn::make('montant')->money('CFA'),
            TextColumn::make('montant_engage')->money('CFA'),
            TextColumn::make('reste')
                ->label("Reste à payer")
                ->money('CFA'),
            TextColumn::make('categorie')
                ->label("Categorie"),
            TextColumn::make('date_debut'),
            TextColumn::make('date_fin'),

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
                    Grid::make([
                        'default'=>2
                    ])->schema([
                        Placeholder::make('historique de decaissement')
                            ->columnSpan(2)
                            ->content(fn ($record) =>\Illuminate\Support\Facades\View::make('filament.table.historique_decaissement', compact('record'))),
                        TextInput::make('taux')->suffix('%'),
                        TextInput::make('montant')
                            ->suffix('FCFA')
                            ->numeric()->label("Montant")
                    ]),
                ])
                ->action(function($data, $record){
                    Decaissement::query()->create([
                        'taux'=>$data['taux'],
                        'montant'=>$data['montant'],
                        'ptba_id'=>$record->ptba_id,
                        'rld_id'=>$record->id,
                    ]);

                    Notification::make()->success()->title("Décaissement ajouté")->send();
                })
                ->label("Ajouter un decaissement")
        ];
    }
}
