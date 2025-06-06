<?php

namespace App\Http\Controllers;

use App\Models\GaArchiveData;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class GaArchiveDataController extends Controller
{
    public function index()
    {
        $archives = GaArchiveData::latest()->get();
        return view('pages.gaArchiveData.index', compact('archives'));
    }

    public function create()
    {
        return view('pages.gaArchiveData.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'filling_number' => 'required',
            'cabinet_number' => 'required',
            'document_name' => 'required',
            'document_file' => 'required|file',
            'date' => 'required|date',
            'category' => 'required',
            'is_generate_qrcode' => 'nullable',
        ]);

        $is_generate = $request->is_generate_qrcode == "on" ? true : false;

        try {
            $file = $request->file('document_file');
            $fileName = 'documents/'.time() . '_' . $file->getClientOriginalName();
            $file->storeAs('documents', $fileName, 'public');

            GaArchiveData::create([
                'no' => $request->no,
                'filling_number' => $request->filling_number,
                'cabinet_number' => $request->cabinet_number,
                'document_name' => $request->document_name,
                'document_file' => $fileName,
                'date' => $request->date,
                'category' => $request->category,
                'is_generate_qrcode' => $is_generate,
                'unique_id' => $is_generate ?  uniqid('archive_') : '0',
            ]);

            Alert::success('Berhasil', 'Data arsip berhasil disimpan');
            return redirect()->route('ga-archive.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function edit(GaArchiveData $gaArchiveData,$id)
    {   
        $gaArchiveData = GaArchiveData::find($id);
        return view('pages.gaArchiveData.edit', compact('gaArchiveData'));
    }

    public function show($id){
        $gaArchiveData = GaArchiveData::find($id);
        return view('pages.gaArchiveData.show', compact('gaArchiveData'));
    }

    public function qrcode($id)
{
    $gaArchiveData = GaArchiveData::find($id);

    if (!$gaArchiveData) {
        return abort(404, 'Data not found');
    }

    $unique_id = $gaArchiveData->unique_id;

    if ($unique_id) {
        // Gunakan backend default tanpa imagick (format PNG langsung dari GD)
        $qrImage = QrCode::format('png')->size(300)->generate($unique_id);

        return response($qrImage)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'attachment; filename="qrcode_' . Str::slug($unique_id) . '.png"');
    }

    Alert::error('Error','Data Tidak Di Temukan');
    return redirect()->back();
}
    public function update(Request $request, GaArchiveData $gaArchiveData,$id)
    {
        $gaArchiveData = GaArchiveData::find($id);
        $request->validate([
            'filling_number' => 'required',
            'cabinet_number' => 'required',
            'document_name' => 'required',
            'date' => 'required|date',
            'category' => 'required',
            'is_generate_qrcode' => 'nullable',
        ]);

        $is_generate = $request->is_generate_qrcode !== '0' ? true : false;

        try {
            $data = [
                'no' => $request->no,
                'filling_number' => $request->filling_number,
                'cabinet_number' => $request->cabinet_number,
                'document_name' => $request->document_name,
                'date' => $request->date,
                'category' => $request->category,
                'is_generate_qrcode' => $is_generate,
                'unique_id' => $is_generate ?  uniqid('archive_') : '0',
            ];

            if ($request->hasFile('document_file')) {
                $file = $request->file('document_file');
                $fileName = 'documents/'. time() . '_' . $file->getClientOriginalName();
                $file->storeAs($fileName, 'public');
                $data['document_file'] = $fileName;
            }
            $gaArchiveData->update($data);
            
            // dd($gaArchiveData);
            Alert::success('Berhasil', 'Data arsip berhasil diperbarui');
            return redirect()->route('ga-archive.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function destroy(GaArchiveData $gaArchiveData)
    {
        try {
            $gaArchiveData->delete();
            Alert::success('Berhasil', 'Data arsip berhasil dihapus');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->route('ga-archive.index');
    }
}
