<?php

namespace App\Http\Controllers;

use App\Models\GaArchiveData;
use App\Models\SuratIzinOperator;
use App\Models\VendorArchiveData;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
    {
        $today = Carbon::today();

        $expiredCount = SuratIzinOperator::where('tanggal_berlaku', '<', $today)->count();
        $activeCount = SuratIzinOperator::where('tanggal_berlaku', '>=', $today)->count();

        // Ambil top 5 GA Archive dokumen berdasarkan access_count
        $topGaArchives = \App\Models\GaArchiveData::orderBy('access_count', 'desc')
                                ->take(5)
                                ->get(['document_name', 'access_count']);

        // Ambil top 5 Vendor Archive dokumen berdasarkan access_count
        $topVendorArchives = \App\Models\VendorArchiveData::orderBy('access_count', 'desc')
                                    ->take(5)
                                    ->get(['document_number', 'access_count']);

        return view('dashboard', compact('expiredCount', 'activeCount', 'topGaArchives', 'topVendorArchives'));
    }


}
