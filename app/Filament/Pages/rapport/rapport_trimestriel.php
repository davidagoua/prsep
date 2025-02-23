<?php

namespace App\Filament\Pages\rapport;

use Filament\Pages\Page;

class rapport_trimestriel extends Page
{
    protected static ?string $navigationGroup = 'Rapportage';
    protected static ?string $title = 'Rapport Trimestriel';

    protected static string $view = 'filament.pages.rapport.rapport_trimestriel';
}
