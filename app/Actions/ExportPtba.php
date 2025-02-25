<?php

namespace App\Actions;

use App\Models\Ild;
use App\Models\Rld;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\SimpleExcel\SimpleExcelWriter;

class ExportPtba
{
    use AsAction;

    public function handle()
    {
        $file_name = "PTBA_definitif_2025.xlsx";
        $writer = SimpleExcelWriter::create($file_name);
        $ild = Ild::query()->with([
            'ptba' => function ($query) {
                $query->where('status', '>=', '30');
            }
        ]);

        foreach ($ild->get() as $ild) {
            $writer->addRow([
                '',
                $ild->titre,
                ''
            ]);

            foreach ($ild->rlds() as $rld) {
                $writer->addRow([
                   '',
                   $rld->titre,
                   $rld->montant,
                    $rld->categorie,
                ]);
            }
        }


        $writer->toBrowser();

    }
}
