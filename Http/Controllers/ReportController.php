<?php

namespace App\Http\Controllers;

use App\Models\BejanaTekan;

use App\Models\{GaArchiveData, VendorArchiveData};
use App\Models\User;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

use App\Exports\ArchiveExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
       
        return view('pages.report.dataMaster',compact('data'));
    }


    public function archive(Request $request)
    {
        $gaData = GaArchiveData::latest()->get();
        $vendorData = VendorArchiveData::latest()->get();

        if ($request->input('export') === 'excel') {
            return Excel::download(new ArchiveExport($gaData, $vendorData), 'arsip.xlsx');
        }

        if ($request->input('export') === 'pdf') {
            $pdf = Pdf::loadView('pages.report.print.archive-pdf', [
                'gaData' => $gaData,
                'vendorData' => $vendorData,
            ]);
            return $pdf->download('arsip.pdf');
        }

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
    
    public function datamaster(Request $request)
    {   
        $category = $request->input('category') ? $request->input('category') :  'bejana-tekan';
        $status = $request->input('status');
        $action = $request->input('action');
        
        // Peta kategori ke nama model
        $modelMap = [
            'bejana-tekan' => \App\Models\BejanaTekan::class,
            'genset' => \App\Models\Genset::class,
            'instalasi-hydrant' => \App\Models\InstalasiHydrant::class,
            'instalasi-listrik' => \App\Models\InstalasiListrik::class,
            'ketel-uap' => \App\Models\KetelUap::class,
            'penyalur-petir' => \App\Models\PenyalurPetir::class,
            'surat-izin-operator' => \App\Models\SuratIzinOperator::class,
            'lain-lain' => \App\Models\LainLain::class,
        ];
        
        // Peta kategori ke nama tampilan
        $categoryNameMap = [
            'bejana-tekan' => 'Bejana Tekan',
            'genset' => 'Genset',
            'instalasi-hydrant' => 'Instalasi Hydrant',
            'instalasi-listrik' => 'Instalasi Listrik',
            'ketel-uap' => 'Ketel Uap',
            'penyalur-petir' => 'Penyalur Petir',
            'surat-izin-operator' => 'Surat Izin Operator',
            'lain-lain' => 'Lain-Lain',
        ];
        
        if (!isset($modelMap[$category])) {
            return redirect()->back()->with('error', 'Kategori tidak valid.');
        }
    
        $model = $modelMap[$category];
        $query = $model::query();
    
        if ($status) {
            $query->where('status', $status);
        }
    
        $data = $query->get();
        $categoryName = $categoryNameMap[$category];

        $manajer = User::where('jabatan','manajer')->first();


        $printViewMap = [
            'bejana-tekan' => 'pages.report.print.bejanaTekan',
            'genset' => 'pages.report.print.genset',
            'instalasi-hydrant' => 'pages.report.print.instalasiHydrant',
            'instalasi-listrik' => 'pages.report.print.instalasiListrik',
            'ketel-uap' => 'pages.report.print.ketelUap',
            'penyalur-petir' => 'pages.report.print.penyalurPetir',
            'surat-izin-operator' => 'pages.report.print.suratIzinOperator',
            'lain-lain' => 'pages.report.print.lainLain',
        ];
        if ($action == 'print') {
            if (!isset($printViewMap[$category])) {
                return redirect()->back()->with('error', 'View untuk kategori ini tidak tersedia.');
            }
        
            $view = $printViewMap[$category];
            $pdf = Pdf::loadView($view, compact('data', 'manajer', 'categoryName', 'status'));
        
            return $pdf->stream($categoryName . '.pdf');
        }
        

        return view('pages.report.dataMaster', compact('data', 'categoryName', 'category', 'status'));
    }

public function exportExcel()
{
    return Excel::download(new ArchiveExport, 'archive-report.xlsx');
}

public function exportPdf()
{
    $gaData = \App\Models\GaArchiveData::all();
    $vendorData = \App\Models\VendorArchiveData::all();
    $pdf = Pdf::loadView('pages.report.exports.archive-pdf', compact('gaData', 'vendorData'));
    return $pdf->download('archive-report.pdf');
}
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
