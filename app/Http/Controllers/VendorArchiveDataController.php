<?php

namespace App\Http\Controllers;

use App\Models\VendorArchiveData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Writer;
use Illuminate\Support\Str;

class VendorArchiveDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $archives = VendorArchiveData::latest()->get();
        return view('pages.vendorArchive.index', compact('archives'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.vendorArchive.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'filling_number' => 'required',
        //     'cabinet_number' => 'required',
        //     'document_name' => 'required',
        //     'date' => 'required',
        //     'company_name' => 'required',
        //     'is_generate_qrcode' => 'nullable',
        //     // 'file_document' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png',
        //     'file_document' => 'required',
        // ]);


        try {

            $is_generate = $request->is_generate_qrcode !== '0' ? true : false;

            $data = [
                'no' => $request->no,
                'filling_number' => $request->filling_number,
                'cabinet_number' => $request->cabinet_number,
                'document_number' => $request->document_name,
                'date' => $request->date,
                'company_name' => $request->company_name,
                'is_generate_qrcode' => $is_generate,
                'unique_id' => $is_generate ?  uniqid('vendor_archive_') : '0',
            ];


            if ($request->hasFile('document_file')) {
                $file = $request->file('document_file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('vendor-documents', $fileName, 'public');
                $data['file_document'] = $fileName;
            }



            VendorArchiveData::create($data);

            Alert::success('Berhasil', 'Data vendor arsip berhasil disimpan');
            return redirect()->route('vendor-archive.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function scan($unique_id)
    {
        $vendorArchiveData = VendorArchiveData::where('unique_id', $unique_id)->firstOrFail();
        return view('pages.vendorArchive.show', compact('vendorArchiveData'));
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vendorArchiveData = VendorArchiveData::find($id);
        return view('pages.vendorArchive.show', compact('vendorArchiveData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VendorArchiveData $vendorArchiveData, $id)
    {
        $vendorArchiveData = VendorArchiveData::find($id);
        return view('pages.vendorArchive.edit', compact('vendorArchiveData'));
    }

    public function qrcode($id)
    {
        $vendorArchiveData = VendorArchiveData::findOrFail($id);

        $unique_id = $vendorArchiveData->unique_id;

        if (!$unique_id || $unique_id === '0') {
            abort(404, 'QR tidak tersedia.');
        }

        // Buat URL untuk QR code
        $url = route('vendor-archive.scan', $unique_id);

        // Pakai SVG agar ringan dan tidak butuh imagick
        $renderer = new ImageRenderer(
            new RendererStyle(300),
            new SvgImageBackEnd()
        );

        $writer = new Writer($renderer);
        $qrCodeSvg = $writer->writeString($url);

        return response($qrCodeSvg)
            ->header('Content-Type', 'image/svg+xml');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VendorArchiveData $vendorArchiveData, $id)
    {
        $vendorArchiveData = VendorArchiveData::find($id);
        $request->validate([
            'filling_number' => 'required',
            'cabinet_number' => 'required',
            'document_number' => 'required',
            'date' => 'required|date',
            'company_name' => 'required',
            'is_generate_qrcode' => 'nullable',
        ]);

        try {

            $is_generate = $request->is_generate_qrcode !== '0' ? true : false;

            $data = [
                'no' => $request->no,
                'filling_number' => $request->filling_number,
                'cabinet_number' => $request->cabinet_number,
                'document_number' => $request->document_number,
                'date' => $request->date,
                'company_name' => $request->company_name,
                'is_generate_qrcode' => $is_generate,
                'unique_id' => $is_generate ?  uniqid('vendor_archive_') : '0',
            ];

            if ($request->hasFile('file_document')) {
                $file = $request->file('file_document');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('vendor-documents', $fileName, 'public');
                $data['file_document'] = $fileName;
            }



            $vendorArchiveData->update($data);


            Alert::success('Berhasil', 'Data vendor arsip berhasil diperbarui');
            return redirect()->route('vendor-archive.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VendorArchiveData $vendorArchiveData)
    {
        try {
            $vendorArchiveData->delete();
            Alert::success('Berhasil', 'Data vendor arsip berhasil dihapus');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->route('vendor-archive.index');
    }
}
