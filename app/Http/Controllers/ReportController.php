<?php

namespace App\Http\Controllers;

use App\Models\GaArchiveData;
use App\Models\VendorArchiveData;
use Illuminate\Http\Request;
use App\Exports\ArchiveExport;
use App\Models\BejanaTekan;
use App\Models\Genset;
use App\Models\InstalasiHydrant;
use App\Models\InstalasiListrik;
use App\Models\KetelUap;
use App\Models\LainLain;
use App\Models\PenyalurPetir;
use App\Models\SuratIzinOperator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function archive(Request $request)
    {
        $gaData = GaArchiveData::latest()->get();
        $vendorData = VendorArchiveData::latest()->get();

        // Export Excel
        if ($request->input('export') === 'excel') {
            return Excel::download(new ArchiveExport($gaData, $vendorData), 'arsip.xlsx');
        }

        // Export PDF
        if ($request->input('export') === 'pdf') {
            $pdf = Pdf::loadView('pages.report.print.archive-pdf', [
                'gaData' => $gaData,
                'vendorData' => $vendorData,
            ]);
            return $pdf->download('arsip.pdf');
        }

        // Default: tampilkan view
        return view('pages.report.archive', compact('gaData', 'vendorData'));
    }

    public function getCabinetNumber(Request $request)
    {
        $category = $request->category;

        if ($category === 'ga-archive') {
            $data = GaArchiveData::select('cabinet_number')->distinct()->get();
        } elseif ($category === 'vendor-archive') {
            $data = VendorArchiveData::select('cabinet_number')->distinct()->get();
        } else {
            $data = [];
        }

        return response()->json($data);
    }

    public function exportExcel()
    {
        $gaData = GaArchiveData::all();
        $vendorData = VendorArchiveData::all();

        return Excel::download(new ArchiveExport($gaData, $vendorData), 'archive-report.xlsx');
    }

    public function exportPdf()
    {
        $gaData = GaArchiveData::all();
        $vendorData = VendorArchiveData::all();

        $pdf = Pdf::loadView('pages.report.print.archive-pdf', compact('gaData', 'vendorData'));
        return $pdf->download('archive-report.pdf');
    }


    public function datamaster(Request $request)
{
    $bejanaTekan = BejanaTekan::latest()->get();
    $hydrant = InstalasiHydrant::latest()->get();
    $listrik = InstalasiListrik::latest()->get();
    $genset = Genset::latest()->get();
    $ketelUap = KetelUap::latest()->get();
    $petir = PenyalurPetir::latest()->get();
    $izin = SuratIzinOperator::latest()->get();
    $lainLain = LainLain::latest()->get();

    if ($request->input('export') === 'excel') {
        return Excel::download(
            new \App\Exports\DataMasterExport(
                $bejanaTekan, $hydrant, $listrik,
                $genset, $ketelUap, $petir, $izin, $lainLain
            ),
            'data-master.xlsx'
        );
    }

    if ($request->input('export') === 'pdf') {
        $pdf = Pdf::loadView('pages.report.print.data-master-pdf', compact(
            'bejanaTekan', 'hydrant', 'listrik',
            'genset', 'ketelUap', 'petir', 'izin', 'lainLain'
        ));
        return $pdf->download('data-master.pdf');
    }

    return view('pages.report.data-master', compact(
        'bejanaTekan', 'hydrant', 'listrik',
        'genset', 'ketelUap', 'petir', 'izin', 'lainLain'
    ));
}

}
