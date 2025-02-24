<?php

namespace App\Filament\Pages\planification;

use Filament\Pages\Page;

class ppm extends Page
{
    protected static ?string $navigationLabel = "PPM";
    protected static ?string $title = "Plan de Passation des Marchés";
    protected static ?string $navigationGroup = "Planification";
    protected static ?int $navigationSort = 10;


    protected static string $view = 'filament.pages.planification.ppm';
}
