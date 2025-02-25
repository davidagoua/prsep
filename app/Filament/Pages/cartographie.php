<?php

namespace App\Filament\Pages;

use App\Models\Rld;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;

class cartographie extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static bool $shouldRegisterNavigation = true;
    protected static ?string $title = 'Cartographie';
    protected static string $view = 'filament.pages.cartographie';

    public $dept_geojson;
    public $dept_data = [];
    public $data = [];
    public $tableauLocalites = [];

    public function mount(){

        $this->dept_geojson = file_get_contents(storage_path('app/private/dpt.geojson'));
        $result = Rld::select(DB::raw("unnest(string_to_array(zone, ',')) as localite"), DB::raw("SUM(montant) as total_montant"))
            ->groupBy('localite')
            ->get();

        foreach ($result as $row) {
            $this->tableauLocalites[$row->localite] = $row->total_montant;
        }
    }



    public function form(Form $form): Form
    {
        return $form->schema([
            Select::make('departement')
                ->searchable()
                ->options(config('app.departements'))
                ->label('Departements')
        ]);
    }
}
