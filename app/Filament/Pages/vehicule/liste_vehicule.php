<?php

namespace App\Filament\Pages\vehicule;

use Filament\Pages\Page;

class liste_vehicule extends Page
{
    protected static ?string $title = 'Liste des vehicules';
    protected static ?string $navigationGroup = "Gestion Véhicule";

    protected static string $view = 'filament.pages.vehicule.liste_vehicule';
}
