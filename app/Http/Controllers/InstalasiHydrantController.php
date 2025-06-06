<?php

namespace App\Http\Controllers;

use App\Models\InstalasiHydrant;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class InstalasiHydrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all the instalasi_hydrants from the database
        $instalasiHydrants = InstalasiHydrant::all();
        // Return a view, passing the instalasi_hydrants data
        return view('pages.instalasiHydrant.index', compact('instalasiHydrants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view to create a new instalasi_hydrant
        return view('pages.instalasiHydrant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'kode' => 'required|string|max:255',
            'kapasitas' => 'required|string|max:255',
            'pilar_hydrant' => 'required|string|max:255',
            'kontak_hydrant' => 'required|string|max:255',
            'selang' => 'required|string|max:255',
            'hose_reel' => 'required|string|max:255',
            'pipa_pancar' => 'required|string|max:255',
            'mesin_penggerak' => 'required|string|max:255',
            'pompa' => 'required|string|max:255',
            'tekanan_kerja_max' => 'required|numeric',
            'no_ijin_pemakaian' => 'required|string|max:255',
            'tanggal_berlaku_sd' => 'required|date',
            'tanggal_input' => 'required|date',
            'status' => 'required|string|max:255',
        ]);

        try{
            // Create a new instalasi_hydrant with the validated data
            InstalasiHydrant::create($validated);
            
            Alert::success('Success',"Berhasil Meyimpan");

            // Redirect to the index with a success message
            return redirect()->route('instalasi-hydrant.index')->with('success', 'Instalasi Hydrant created successfully!');
        }catch(Exception $e ){
            Log::error($e->getMessage());
            Alert::error('Gagal',"Gagal Meyimpan");
            return redirect()->back()->with('error','Gagal');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(InstalasiHydrant $instalasiHydrant)
    {   

        $instalasi_hydrant = $instalasiHydrant;
        // Return a view showing the details of the selected instalasi_hydrant
        return view('pages.instalasiHydrant.show', compact('instalasi_hydrant'));
    }
    public function cetak($id)
    {
        $instalasiHydrant = InstalasiHydrant::findOrFail($id);

        // $qrCode = base64_encode(QrCode::format('png')->size(200)->generate($instalasiHydrant));

        $manajer = User::where('jabatan','manajer')->first();
    
        // Kirim data ke view PDF
        $pdf = Pdf::loadView('pages.instalasiHydrant.cetak', compact('instalasiHydrant','manajer'));
    
        // Tampilkan PDF di browser (preview)
        return $pdf->stream('instalasihydrant-'.$id.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InstalasiHydrant $instalasiHydrant)
    {   
        $instalasi_hydrant = $instalasiHydrant;
        // Return the edit form with the existing data
        return view('pages.instalasiHydrant.edit', compact('instalasi_hydrant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InstalasiHydrant $instalasiHydrant)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'kode' => 'required|string|max:255',
            'kapasitas' => 'required|string|max:255',
            'pilar_hydrant' => 'required|string|max:255',
            'kontak_hydrant' => 'required|string|max:255',
            'selang' => 'required|string|max:255',
            'hose_reel' => 'required|string|max:255',
            'pipa_pancar' => 'required|string|max:255',
            'mesin_penggerak' => 'required|string|max:255',
            'pompa' => 'required|string|max:255',
            'tekanan_kerja_max' => 'required|numeric',
            'no_ijin_pemakaian' => 'required|string|max:255',
            'tanggal_berlaku_sd' => 'required|date',
            'tanggal_input' => 'required|date',
            'status' => 'required|string|max:255',
        ]);

        try{
            
                    // Update the instalasi_hydrant with the validated data
                    $instalasiHydrant->update($validated);
                Alert::success('Success',"Berhasil Menyimpan");
                    // Redirect back to the index with a success message
                    return redirect()->route('instalasi-hydrant.index')->with('success', 'Instalasi Hydrant updated successfully!');
        }catch(Exception $e){
            Alert::error('Error','Gagal Meyimpan');
            return redirect()->route('instalasi-hydrant.index')->with('eror', 'Instalasi Hydrant updated failed!');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InstalasiHydrant $instalasiHydrant)
    {

        try{
            // Delete the instalasi_hydrant
            $instalasiHydrant->delete();
    
            Alert::success('Success',"Berhasil Di Hapus");
            // Redirect back to the index with a success message
            return redirect()->route('instalasi-hydrant.index')->with('success', 'Instalasi Hydrant deleted successfully!');
        }catch(Exception $e){
            Alert::error('Gagal',"Gagal Menghapus");
            // Redirect back to the index with a success message
            return redirect()->route('instalasi-hydrant.index')->with('success', 'Instalasi Hydrant deleted successfully!');
        }
    }
}
