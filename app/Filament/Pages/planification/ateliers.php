<?php

namespace App\Filament\Pages\planification;

use Filament\Pages\Page;

class ateliers extends Page
{
    protected static ?string $navigationLabel = "Ateliers";
    protected static ?string $title = "Ateliers";
    protected static ?string $navigationGroup = "Planification";
    protected static ?int $navigationSort = 20;

    protected static string $view = 'filament.pages.planification.ateliers';
}
