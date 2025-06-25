<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DataMasterExport implements FromView
{
    public function __construct(
        public $bejanaTekan, public $hydrant, public $listrik,
        public $genset, public $ketelUap, public $petir,
        public $izin, public $lainLain
    ) {}

    public function view(): View
    {
        return view('pages.report.exports.data-master-excel', [
            'bejanaTekan' => $this->bejanaTekan,
            'hydrant' => $this->hydrant,
            'listrik' => $this->listrik,
            'genset' => $this->genset,
            'ketelUap' => $this->ketelUap,
            'petir' => $this->petir,
            'izin' => $this->izin,
            'lainLain' => $this->lainLain,
        ]);
    }
}
