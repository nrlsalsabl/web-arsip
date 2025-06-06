<?php

namespace App\Http\Controllers;

use App\Models\PenyalurPetir;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenyalurPetirController extends Controller
{
    public function index()
    {
        $data = PenyalurPetir::latest()->get();
        return view('pages.penyalurPetir.index', compact('data'));
    }

    public function create()
    {
        return view('pages.penyalurPetir.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_penyalur_petir' => 'required|string',
            'radius_proteksi' => 'required|string',
            'panjang_bangunan' => 'required|string',
            'lebar_bangunan' => 'required|string',
            'tinggi_penyalur' => 'required|string',
            'bentuk_elektroda' => 'required|string',
            'alat_ukur' => 'required|string',
            'pelaksana_pemasangan' => 'required|string',
            'tanggal_berlaku_sampai' => 'required|date',
        ]);

        try {
            PenyalurPetir::create($request->all());
            Alert::success('Berhasil', 'Data penyalur petir berhasil ditambahkan.');
            return redirect()->route('penyalur-petir.index');
        } catch (\Throwable $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menyimpan data.');
            return back()->withInput();
        }
    }

    public function show(PenyalurPetir $penyalurPetir)
    {
        return view('pages.penyalurPetir.show', compact('penyalurPetir'));
    }

    public function cetak($id)
    {
        $penyalurPetir = PenyalurPetir::findOrFail($id);

        // $qrCode = base64_encode(QrCode::format('png')->size(200)->generate($penyalurPetir));

        $manajer = User::where('jabatan','manajer')->first();
    
        // Kirim data ke view PDF
        $pdf = Pdf::loadView('pages.penyalurPetir.cetak', compact('penyalurPetir','manajer'));
    
        // Tampilkan PDF di browser (preview)
        return $pdf->stream('penyalurPetir-'.$id.'.pdf');
    }

    public function edit(PenyalurPetir $penyalurPetir)
    {
        return view('pages.penyalurPetir.edit', compact('penyalurPetir'));
    }

    public function update(Request $request, PenyalurPetir $penyalurPetir)
    {
        $request->validate([
            'jenis_penyalur_petir' => 'required|string',
            'radius_proteksi' => 'required|string',
            'panjang_bangunan' => 'required|string',
            'lebar_bangunan' => 'required|string',
            'tinggi_penyalur' => 'required|string',
            'bentuk_elektroda' => 'required|string',
            'alat_ukur' => 'required|string',
            'pelaksana_pemasangan' => 'required|string',
            'tanggal_berlaku_sampai' => 'required|date',
        ]);

        try {
            $penyalurPetir->update($request->all());
            Alert::success('Berhasil', 'Data penyalur petir berhasil diperbarui.');
            return redirect()->route('penyalur-petir.index');
        } catch (\Throwable $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat mengupdate data.');
            return back()->withInput();
        }
    }

    public function destroy(PenyalurPetir $penyalurPetir)
    {
        try {
            $penyalurPetir->delete();
            Alert::success('Berhasil', 'Data penyalur petir berhasil dihapus.');
        } catch (\Throwable $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
        }

        return redirect()->route('penyalur-petir.index');
    }
}
