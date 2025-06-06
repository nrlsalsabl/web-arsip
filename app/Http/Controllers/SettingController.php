<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function index(){
        return view('pages.settings.index');
    }

    public function update(Request $request)
{
    // Simpan teks biasa
    Setting::set('site_name', $request->site_name);
    Setting::set('phone', $request->phone);
    Setting::set('address', $request->address);
    Setting::set('email', $request->email);
    Setting::set('website', $request->website);
    
    // Simpan file upload
    foreach (['logo','favicon', 'dashboard_thumbnail', 'login_background'] as $key) {
        if ($request->hasFile($key)) {
            $file = $request->file($key);

            // Hapus file lama jika ada
            $oldPath = Setting::get($key);
            if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }

            // Simpan file baru ke storage/app/public/setting/
            $path = $file->store('setting', 'public');

            // Simpan path ke DB (relatif dari public)
            Setting::set($key, $path);
        }
    }
    Alert::success('Success','Berhasil Meyimpan');
    return back()->with('success', 'Pengaturan berhasil disimpan.');
}
}
