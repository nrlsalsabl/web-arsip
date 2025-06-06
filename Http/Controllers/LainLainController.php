<?php

namespace App\Http\Controllers;

use App\Models\LainLain;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LainLainController extends Controller
{
    public function index()
    {
        $data = LainLain::all();
        return view('pages.lainLain.index', compact('data'));
    }

    public function create()
    {
        return view('pages.lainLain.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama_perijinan' => 'required|string|max:255',
            'no_perijinan' => 'required|string|max:255',
            'di_terbitkan_oleh' => 'required|string|max:255',
            'tanggal_dikeluarkan' => 'required|date',
            'tanggal_berlaku' => 'required|date',
        ]);

        try {
            LainLain::create($request->all());
            Alert::success('Berhasil', 'Data berhasil ditambahkan');
            return redirect()->route('lain-lain.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function show(LainLain $lainLain)
    {
        return view('pages.lainlain.show', compact('lainLain'));
    }

    public function edit(LainLain $lainLain)
    {
        return view('pages.lainLain.edit', compact('lainLain'));
    }

    public function update(Request $request, LainLain $lainLain)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama_perijinan' => 'required|string|max:255',
            'no_perijinan' => 'required|string|max:255',
            'di_terbitkan_oleh' => 'required|string|max:255',
            'tanggal_dikeluarkan' => 'required|date',
            'tanggal_berlaku' => 'required|date',
        ]);

        try {
            $lainLain->update($request->all());
            Alert::success('Berhasil', 'Data berhasil diupdate');
            return redirect()->route('lain-lain.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function destroy(LainLain $lainLain)
    {
        try {
            $lainLain->delete();
            Alert::success('Berhasil', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->route('lain-lain.index');
    }
}
