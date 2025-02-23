<?php

namespace App\Filament\Pages\planification;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class departmement extends Page implements HasForms, HasTable
{

    use InteractsWithTable;
    protected static ?string $navigationLabel = "PTBA departement";
    protected static ?string $title = "PTBA departement";
    use InteractsWithForms;
    protected static ?string $navigationGroup = "Planification";
    protected static string $view = 'filament.pages.planification.departmement';


    public function getTableQuery()
    {
        return User::query();
    }
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

    protected function getHeaderActions(): array
    {
        return [
            Action::make("ptba_initial")->label("PTBA Initial")
                ->form([
                    FileUpload::make('fichier_1')->label("PTBA initial"),
                ])
                ->icon('heroicon-o-arrow-up-on-square'),
            Action::make("ptba_elabore")->label("PTBA elaboré")
                ->disabled(true)
                ->form([
                    FileUpload::make('fichier_1')->label("PTBA elaboré"),
                ])
                ->icon('heroicon-o-arrow-up-on-square'),
            Action::make("ptba_definitif")->label("PTBA Définitif")
                ->disabled(true)
                ->form([
                    FileUpload::make('fichier_1')->label("PTBA Définitif"),
                ])
                ->icon('heroicon-o-arrow-up-on-square'),
        ];
    }


}
