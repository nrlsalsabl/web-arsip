<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VendorArchiveData;
use App\Models\VendorForm;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;


class VendorFormController extends Controller
{
    public function index()
    {
        $vendorForms = VendorForm::all();
        return view('pages.vendorForm.index', compact('vendorForms'));
    }

    public function create()
    {
        return view('pages.vendorForm.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no' => 'required|string',
            'core_of_business' => 'required|string',
            'full_company_name' => 'required|string',
            'npwd' => 'required|string',
            'address' => 'required|string',
            'postal_code' => 'required|string',
            'city' => 'required|string',
            'region' => 'required|string',
            'country' => 'required|string',
            'phone' => 'required|string',
            'fax' => 'nullable|string',
            'website' => 'nullable|string',
            'state' => 'required|string',
            'trading_term' => 'required|string',
            'payment_term' => 'required|string',
            'contact_name' => 'required|string',
            'contact_position' => 'required|string',
            'email_address' => 'required|email',
            'mobile_number' => 'required|string',
            'document_expiry_date' => 'required|date',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            VendorForm::create($validated);
            Alert::success('Berhasil', 'Data vendor berhasil ditambahkan.');
            return redirect()->route('vendor-form.index');
        } catch (\Throwable $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menyimpan data.');
            return redirect()->back()->withInput();
        }
    }

    public function show($id)
    {
        $vendor = VendorForm::find($id);
        return view('pages.vendorForm.show', compact('vendor'));
    }

    public function cetak($id)
    {
        $vendor = VendorForm::findOrFail($id);

        // $qrCode = base64_encode(QrCode::format('png')->size(200)->generate($vendor));

        $manajer = User::where('jabatan','manajer')->first();
    
        // Kirim data ke view PDF
        $pdf = Pdf::loadView('pages.vendorForm.cetak', compact('vendor','manajer'));
    
        // Tampilkan PDF di browser (preview)
        return $pdf->stream('genset-'.$id.'.pdf');
    }

    public function edit(VendorForm $vendor,$id)

    {   
        $vendor = VendorForm::find($id);
        return view('pages.vendorForm.edit', compact('vendor'));
    }

   

    public function update(Request $request, VendorForm $vendorForm)
    {
        $validated = $request->validate([
            'no' => 'required|string',
            'core_of_business' => 'required|string',
            'full_company_name' => 'required|string',
            'npwd' => 'required|string',
            'address' => 'required|string',
            'postal_code' => 'required|string',
            'city' => 'required|string',
            'region' => 'required|string',
            'country' => 'required|string',
            'phone' => 'required|string',
            'fax' => 'nullable|string',
            'website' => 'nullable|string',
            'state' => 'required|string',
            'trading_term' => 'required|string',
            'payment_term' => 'required|string',
            'contact_name' => 'required|string',
            'contact_position' => 'required|string',
            'email_address' => 'required|email',
            'mobile_number' => 'required|string',
            'document_expiry_date' => 'required|date',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            $vendorForm->update($validated);
            Alert::success('Berhasil', 'Data vendor berhasil diperbarui.');
            return redirect()->route('vendor-form.index');
        } catch (\Throwable $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat memperbarui data.');
            return redirect()->back()->withInput();
        }
    }

    public function destroy(VendorForm $vendorForm)
    {
        try {
            $vendorForm->delete();
            Alert::success('Berhasil', 'Data vendor berhasil dihapus.');
        } catch (\Throwable $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
        }

        return redirect()->route('vendor-form.index');
    }
}
