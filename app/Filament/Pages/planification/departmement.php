<?php

namespace App\Filament\Pages\planification;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Tables\Concerns\InteractsWithTable;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class departmement extends Page implements HasForms
{

    protected static ?string $navigationLabel = "PTBA departement";
    protected static ?string $title = "PTBA departement";
    use InteractsWithForms;
    protected static ?string $navigationGroup = "Planification";
    protected static string $view = 'filament.pages.planification.departmement';

    public function form(Form $form): Form
    {
        return $form->schema([
            Placeholder::make('Template')->content(new HtmlString("<a class='p-2 w-full rounded bg-primary-500 text-white'>Télécharger</a>"))
                ->columnSpan(3),
            FileUpload::make('fichier_1')->label("PTBA initial"),
            FileUpload::make('fichier_2')->label("PTBA élaboré")->disabled(true),
            FileUpload::make('fichier_3')->label("PTBA final")->disabled(true),
        ])
        ->columns(3);
    }


}
