<?php

namespace App\Actions;

use App\Models\Rld;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\SimpleExcel\SimpleExcelWriter;

class ExportPtba
{
    use AsAction;

    public function handle()
    {
        $file_name = "PTBA_definitif_2025.xlsx";

        $rlds_init = Rld::query()->with([
            'ild',
           'departement',
           'ptba' => function ($query) {
                $query->where('status', '>=', '30');
           }
        ]);

        $rlds = $rlds_init->get()->map(fn ($rld) => [
            'ILD'=>$rld->ild->titre,
            'RLD' => $rld->titre,
            'name' => $rld->name,
            'Categorie des dépenses' => $rld->categorie,
        ])
        ->groupBy(['ILD'])
        ->toArray();

        //dd($rlds);

        $writer = SimpleExcelWriter::streamDownload($file_name);

        $writer->addRow([
            '',
            'Montant total du Financement',
            'SUIVI PTBA 2025'
        ]);

        $writer->addRow([
            '',
            $rlds_init->sum('montant').' FCFA',
            ''
        ]);

        foreach ($rlds as $ild => $rldss) {
            $writer->addRow([
                '',
                $ild,
                ''
            ]);
            $writer->addRows($rldss->toArray());
        }

        $writer->toBrowser();

    }
}
