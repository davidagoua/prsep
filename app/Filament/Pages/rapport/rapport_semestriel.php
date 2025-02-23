<?php

namespace App\Filament\Pages\rapport;

use Filament\Pages\Page;

class rapport_semestriel extends Page
{
    protected static ?string $navigationGroup = 'Rapportage';
    protected static ?string $title = 'Rapport Semestriel';
    protected static ?int $navigationSort = 10;
    protected static string $view = 'filament.pages.rapport.rapport_semestriel';
}
