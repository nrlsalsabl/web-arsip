<?php

namespace App\Http\Controllers;

use App\Models\GaArchiveData;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Writer;
use Illuminate\Support\Facades\Response;
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

        $is_generate = $request->is_generate_qrcode == "on";

        try {
            $file = $request->file('document_file');
            $fileName = 'documents/' . time() . '_' . $file->getClientOriginalName();
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
                'unique_id' => $is_generate ? uniqid('archive_') : '0',
            ]);

            Alert::success('Berhasil', 'Data arsip berhasil disimpan');
            return redirect()->route('ga-archive.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function qrcode($id)
    {
        $gaArchiveData = GaArchiveData::find($id);

        if (!$gaArchiveData || !$gaArchiveData->unique_id) {
            abort(404, 'Data tidak ditemukan');
        }

        // Buat URL tujuan QR Code
        $url = route('ga-archive.scan', $gaArchiveData->unique_id);

        // Gunakan SVG agar tidak tergantung imagick
        $renderer = new ImageRenderer(
            new RendererStyle(300),
            new SvgImageBackEnd()
        );

        $writer = new Writer($renderer);
        $qrCodeSvg = $writer->writeString($url);

        return response($qrCodeSvg)
            ->header('Content-Type', 'image/svg+xml');
    }

    public function scan($unique_id)
    {
        $gaArchiveData = GaArchiveData::where('unique_id', $unique_id)->first();

        if (!$gaArchiveData) {
            return abort(404, 'Arsip tidak ditemukan');
        }

        $gaArchiveData->increment('access_count');

        return view('pages.gaArchiveData.show', compact('gaArchiveData'));
    }

    public function show($id)
    {
        $gaArchiveData = GaArchiveData::findOrFail($id);
        $gaArchiveData->increment('access_count');
        return view('pages.gaArchiveData.show', compact('gaArchiveData'));
    }

    public function edit(GaArchiveData $gaArchiveData, $id)
    {
        $gaArchiveData = GaArchiveData::find($id);
        return view('pages.gaArchiveData.edit', compact('gaArchiveData'));
    }

    public function update(Request $request, GaArchiveData $gaArchiveData, $id)
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

        $is_generate = $request->is_generate_qrcode !== '0';

        try {
            $data = [
                'no' => $request->no,
                'filling_number' => $request->filling_number,
                'cabinet_number' => $request->cabinet_number,
                'document_name' => $request->document_name,
                'date' => $request->date,
                'category' => $request->category,
                'is_generate_qrcode' => $is_generate,
                'unique_id' => $is_generate ? uniqid('archive_') : '0',
            ];

            if ($request->hasFile('document_file')) {
                $file = $request->file('document_file');
                $fileName = 'documents/' . time() . '_' . $file->getClientOriginalName();
                $file->storeAs('documents', $fileName, 'public');
                $data['document_file'] = $fileName;
            }

            $gaArchiveData->update($data);

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
