<?php

namespace App\Http\Controllers;

use App\Models\BejanaTekan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;


class BejanaTekanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $bejanas = BejanaTekan::all();
        return view('pages.bejanaTekan.index',compact('bejanas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.bejanaTekan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{   
    $validated = $request->validate([
        'kode' => 'required|string|max:255',
        'jenis_pesawat' => 'required|string|max:255',
        'tempat_pembuatan' => 'required|string|max:255',
        'no_seri' => 'required|string|max:255',
        'bentuk_bejana' => 'required|string|max:255',
        'tekanan_kerja' => 'required|string|max:255',
        'volume' => 'required|string|max:255',
        'bahan_diisi' => 'required|string|max:255',
        'no_izin_pemakaian' => 'required|string|max:255',
        'tanggal_berlaku' => 'required|date',
        'tanggal_input' => 'required|date',
        'status' => 'required|in:active,inactive',
    ]);

    try{
        BejanaTekan::create($validated);
        Alert::success('Success',"Berhasil Meyimpan");
        return redirect()->route('bejana-tekan.index')->with('success', 'Data Bejana Tekan berhasil disimpan.');
    }catch(Exception $e){
        Log::error('error bejana tekan',$e->getMessage());
        Alert::error('Gagal',"Gagal Meyimpan");
        return redirect()->route('bejana-tekan.index')->with('error', 'Gagal Menyimpan');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(BejanaTekan $bejanaTekan)
    {
        return view('pages.bejanaTekan.show',compact('bejanaTekan'));
    }

    public function cetak($id)
    {
        $bejanaTekan = BejanaTekan::findOrFail($id);

        $qrCode = base64_encode(QrCode::format('png')->size(200)->generate($bejanaTekan));

        $manajer = User::where('jabatan','manajer')->first();
    
        // Kirim data ke view PDF
        $pdf = PDF::loadView('pages.bejanaTekan.cetak', compact('bejanaTekan','manajer','qrCode'));
    
        // Tampilkan PDF di browser (preview)
        return $pdf->stream('bejana-tekan-'.$id.'.pdf');
    }

    public function qrcode($id)
    {   
    
        $bejanaTekan = BejanaTekan::find($id);
    
        if (!$bejanaTekan) {
            return abort(404, 'Data not found');
        }
    
        if ($bejanaTekan) {
            // Gunakan backend default tanpa imagick (format PNG langsung dari GD)
            $qrImage = QrCode::format('png')->size(300)->generate($bejanaTekan);
    
            return response($qrImage)
                ->header('Content-Type', 'image/png')
                ->header('Content-Disposition', 'attachment; filename="qrcode_' . Str::slug($bejanaTekan->kode) . '.png"');
        }

        Alert::error('Error','Data Tidak Di Temukan');
        return redirect()->back();
    }
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BejanaTekan $bejanaTekan)
    {
        return view('pages.bejanaTekan.edit',compact('bejanaTekan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BejanaTekan $bejanaTekan)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:255',
            'jenis_pesawat' => 'required|string|max:255',
            'tempat_pembuatan' => 'required|string|max:255',
            'no_seri' => 'required|string|max:255',
            'bentuk_bejana' => 'required|string|max:255',
            'tekanan_kerja' => 'required|string|max:255',
            'volume' => 'required|string|max:255',
            'bahan_diisi' => 'required|string|max:255',
            'no_izin_pemakaian' => 'required|string|max:255',
            'tanggal_berlaku' => 'required|date',
            'tanggal_input' => 'required|date',
            'status' => 'required|in:active,inactive',
        ]);
    
        try{
            $bejanaTekan->update($validated);
            Alert::success('Success',"Berhasil Mengupdate");
            return redirect()->route('bejana-tekan.index')->with('success', 'Data Bejana Tekan berhasil diupdate.');
        }catch(Exception $e){
            Log::error('error bejana tekan',$e->getMessage());
            Alert::error('Gagal',"Gagal Mengupdate");
            return redirect()->route('bejana-tekan.index')->with('error', 'Gagal Mengupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BejanaTekan $bejanaTekan)
    {
        try{
            $bejanaTekan->delete();
            Alert::success('Success','Berhasil Menghapus');
            return redirect()->back();
        }catch(Exception $e){
            Alert::error('Error',"Gagal Menghapus");
            return redirect()->back();
        }
    }
}
