<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ArchiveExport implements FromView
{
    protected $gaData;
    protected $vendorData;

    public function __construct($gaData, $vendorData)
    {
        $this->gaData = $gaData;
        $this->vendorData = $vendorData;
    }

    public function view(): View
    {
        return view('pages.report.exports.archive-excel', [
            'gaData' => $this->gaData,
            'vendorData' => $this->vendorData,
        ]);
    }
}
