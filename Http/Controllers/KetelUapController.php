<?php

namespace App\Http\Controllers;

use App\Models\KetelUap;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KetelUapController extends Controller
{
    public function index()
    {
        $ketelUaps = KetelUap::all();
        return view('pages.ketelUap.index', compact('ketelUaps'));
    }

    public function create()
    {
        return view('pages.ketelUap.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string',
            'nama' => 'required|string',
            'akte_izin_no' => 'required|string',
            'tanggal_berlaku' => 'required|date',
        ]);

        try {
            KetelUap::create($request->all());
            Alert::success('Berhasil', 'Data berhasil ditambahkan');
            return redirect()->route('ketel-uap.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menyimpan data');
            return redirect()->back()->withInput();
        }
    }

    public function show(KetelUap $ketelUap)
    {
        return view('pages.ketelUap.show', compact('ketelUap'));
    }

    public function cetak($id)
    {
        $ketelUap = KetelUap::findOrFail($id);

        // $qrCode = base64_encode(QrCode::format('png')->size(200)->generate($ketelUap));

        $manajer = User::where('jabatan','manajer')->first();
    
        // Kirim data ke view PDF
        $pdf = Pdf::loadView('pages.ketelUap.cetak', compact('ketelUap','manajer'));
    
        // Tampilkan PDF di browser (preview)
        return $pdf->stream('ketelUap-'.$id.'.pdf');
    }

    public function edit(KetelUap $ketelUap)
    {
        return view('pages.ketelUap.edit', compact('ketelUap'));
    }

    public function update(Request $request, KetelUap $ketelUap)
    {
        $request->validate([
            'kode' => 'required|string',
            'nama' => 'required|string',
            'akte_izin_no' => 'required|string',
            'tanggal_berlaku' => 'required|date',
        ]);

        try {
            $ketelUap->update($request->all());
            Alert::success('Berhasil', 'Data berhasil diperbarui');
            return redirect()->route('ketel-uap.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat memperbarui data');
            return redirect()->back()->withInput();
        }
    }

    public function destroy(KetelUap $ketelUap)
    {
        try {
            $ketelUap->delete();
            Alert::success('Berhasil', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data');
        }

        return redirect()->route('ketel-uap.index');
    }
}
