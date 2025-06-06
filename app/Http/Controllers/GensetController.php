<?php

namespace App\Http\Controllers;

use App\Models\Genset;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GensetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gensets = Genset::all();
        return view('pages.genset.index', compact('gensets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.genset.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:255',
            'jenis_alat' => 'required|string|max:255',
            'nama_pabrik_pembuatan' => 'required|string|max:255',
            'tempat_pembuatan' => 'required|string|max:255',
            'nomor_pabrik_pembuatan' => 'required|string|max:255',
            'daya' => 'required|string|max:255',
            'no_pengesahan' => 'required|string|max:255',
            'tanggal_berlaku' => 'required|date',
            'tanggal_input' => 'required|date',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            Genset::create($validated);
            Alert::success('Sukses', 'Data genset berhasil disimpan');
            return redirect()->route('genset.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Gagal menyimpan data genset: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Genset $genset)
    {
        return view('pages.genset.show', compact('genset'));
    }

    public function cetak($id)
    {
        $genset = Genset::findOrFail($id);

        // $qrCode = base64_encode(QrCode::format('png')->size(200)->generate($genset));

        $manajer = User::where('jabatan','manajer')->first();
    
        // Kirim data ke view PDF
        $pdf = Pdf::loadView('pages.genset.cetak', compact('genset','manajer'));
    
        // Tampilkan PDF di browser (preview)
        return $pdf->stream('genset-'.$id.'.pdf');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genset $genset)
    {
        return view('pages.genset.edit', compact('genset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genset $genset)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:255',
            'jenis_alat' => 'required|string|max:255',
            'nama_pabrik_pembuatan' => 'required|string|max:255',
            'tempat_pembuatan' => 'required|string|max:255',
            'nomor_pabrik_pembuatan' => 'required|string|max:255',
            'daya' => 'required|string|max:255',
            'no_pengesahan' => 'required|string|max:255',
            'tanggal_berlaku' => 'required|date',
            'tanggal_input' => 'required|date',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            $genset->update($validated);
            Alert::success('Sukses', 'Data genset berhasil diperbarui');
            return redirect()->route('genset.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Gagal memperbarui data genset: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genset $genset)
    {
        try {
            $genset->delete();
            Alert::success('Sukses', 'Data genset berhasil dihapus');
            return redirect()->route('genset.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Gagal menghapus data genset: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
