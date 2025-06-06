<?php

namespace App\Http\Controllers;

use App\Models\SuratIzinOperator;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class SuratIzinOperatorController extends Controller
{
    public function index()
    {   
        $data = SuratIzinOperator::with('user')->latest()->get();
        return view('pages.suratIzinOperator.index', compact('data'));
    }

    public function create()
    {   
        $users = User::all();
        return view('pages.suratIzinOperator.create',compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'no_sertifikat' => 'required|string|max:255',
            'jenis_sertifikat' => 'required|string|max:255',
            'tanggal_berlaku' => 'required|date',
        ]);

        try {
            SuratIzinOperator::create([
                'user_id' => $request->user_id,
                'no_sertifikat' => $request->no_sertifikat,
                'jenis_sertifikat' => $request->jenis_sertifikat,
                'tanggal_berlaku' => $request->tanggal_berlaku,
            ]);

            Alert::success('Berhasil', 'Data berhasil ditambahkan.');
            return redirect()->route('surat-izin-operator.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function show(SuratIzinOperator $suratIzinOperator)
    {   
        $users = User::all();

        return view('pages.suratIzinOperator.show', compact('suratIzinOperator','users'));
    }

    public function cetak($id)
    {
        $suratIzinOperator = SuratIzinOperator::findOrFail($id);

        // $qrCode = base64_encode(QrCode::format('png')->size(200)->generate($suratIzinOperator));

        $manajer = User::where('jabatan','manajer')->first();
    
        // Kirim data ke view PDF
        $pdf = Pdf::loadView('pages.suratIzinOperator.cetak', compact('suratIzinOperator','manajer'));
    
        // Tampilkan PDF di browser (preview)
        return $pdf->stream('suratIzinOperator-'.$id.'.pdf');
    }

    public function edit(SuratIzinOperator $suratIzinOperator)
    {   
        $users = User::all();
        return view('pages.suratIzinOperator.edit', compact('suratIzinOperator','users'));
    }

    public function update(Request $request, SuratIzinOperator $suratIzinOperator)
    {
        $request->validate([
            'user_id' => 'required',
            'no_sertifikat' => 'required|string|max:255',
            'jenis_sertifikat' => 'required|string|max:255',
            'tanggal_berlaku' => 'required|date',
        ]);

        try {
            $suratIzinOperator->update([
                'user_id' => $request->user_id,
                'no_sertifikat' => $request->no_sertifikat,
                'jenis_sertifikat' => $request->jenis_sertifikat,
                'tanggal_berlaku' => $request->tanggal_berlaku,
            ]);

            Alert::success('Berhasil', 'Data berhasil diperbarui.');
            return redirect()->route('surat-izin-operator.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function destroy(SuratIzinOperator $suratIzinOperator)
    {
        try {
            $suratIzinOperator->delete();

            Alert::success('Berhasil', 'Data berhasil dihapus.');
            return back();
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }
}
