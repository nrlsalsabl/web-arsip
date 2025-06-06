<?php

namespace App\Http\Controllers;

use App\Models\InstalasiListrik;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InstalasiListrikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instalasiListriks = InstalasiListrik::all();
        return view('pages.instalasiListrik.index', compact('instalasiListriks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.instalasiListrik.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_arus' => 'required|string',
            'jumlah_daya' => 'required|string',
            'sumber_tenaga_listrik' => 'required|string',
            'no_pengasahaan' => 'required|string',
            'tanggal_berlaku' => 'required|date',
            'tanggal_input' => 'required|date',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            InstalasiListrik::create([
                'jenis_arus' => $request->jenis_arus,
                'jumlah_daya' => $request->jumlah_daya,
                'sumber_tenaga_listrik' => $request->sumber_tenaga_listrik,
                'no_pengasahaan' => $request->no_pengasahaan,
                'tanggal_berlaku' => $request->tanggal_berlaku,
                'tanggal_input' => $request->tanggal_input,
                'status' => $request->status,
            ]);

            Alert::success('Berhasil', 'Data instalasi listrik berhasil ditambahkan.');
            return redirect()->route('instalasi-listrik.index');
        } catch (\Throwable $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menyimpan data.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(InstalasiListrik $instalasiListrik)
    {
        return view('pages.instalasiListrik.show', compact('instalasiListrik'));
    }

    public function cetak($id)
    {
        $instalasiListrik = InstalasiListrik::findOrFail($id);

        // $qrCode = base64_encode(QrCode::format('png')->size(200)->generate($instalasiListrik));

        $manajer = User::where('jabatan','manajer')->first();
    
        // Kirim data ke view PDF
        $pdf = Pdf::loadView('pages.instalasiListrik.cetak', compact('instalasiListrik','manajer'));
    
        // Tampilkan PDF di browser (preview)
        return $pdf->stream('instalasiListrik-'.$id.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InstalasiListrik $instalasiListrik)
    {   
        return view('pages.instalasiListrik.edit', compact('instalasiListrik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InstalasiListrik $instalasiListrik)
    {
        $request->validate([
            'jenis_arus' => 'required|string',
            'jumlah_daya' => 'required|string',
            'sumber_tenaga_listrik' => 'required|string',
            'no_pengasahaan' => 'required|string',
            'tanggal_berlaku' => 'required|date',
            'tanggal_input' => 'required|date',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            $instalasiListrik->update([
                'jenis_arus' => $request->jenis_arus,
                'jumlah_daya' => $request->jumlah_daya,
                'sumber_tenaga_listrik' => $request->sumber_tenaga_listrik,
                'no_pengasahaan' => $request->no_pengasahaan,
                'tanggal_berlaku' => $request->tanggal_berlaku,
                'tanggal_input' => $request->tanggal_input,
                'status' => $request->status,
            ]);

            Alert::success('Berhasil', 'Data instalasi listrik berhasil diperbarui.');
            return redirect()->route('instalasi-listrik.index');
        } catch (\Throwable $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat memperbarui data.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InstalasiListrik $instalasiListrik)
    {
        try {
            $instalasiListrik->delete();
            Alert::success('Berhasil', 'Data instalasi listrik berhasil dihapus.');
        } catch (\Throwable $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
        }

        return redirect()->route('instalasi-listrik.index');
    }
}
