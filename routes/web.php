<?php

use App\Http\Controllers\BejanaTekanController;
use App\Http\Controllers\GaArchiveDataController;
use App\Http\Controllers\GensetController;
use App\Http\Controllers\InstalasiHydrantController;
use App\Http\Controllers\InstalasiListrikController;
use App\Http\Controllers\KetelUapController;
use App\Http\Controllers\LainLainController;
use App\Http\Controllers\PenyalurPetirController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SuratIzinOperatorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorArchiveDataController;
use App\Http\Controllers\VendorFormController;
use RealRashid\SweetAlert\Facades\Alert;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| This file is where you can register web routes for your application.
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated Routes Group
Route::middleware('auth')->group(function () {
    // User Management Routes
    Route::resource('user', UserController::class);

    // Bejana Tekan Routes
    Route::resource('bejana-tekan', BejanaTekanController::class);
    Route::get('bejana-tekan/{id}/cetak', [BejanaTekanController::class, 'cetak'])->name('bejana-tekan.cetak');
    Route::get('bejana-tekan/{id}/qrcode', [BejanaTekanController::class, 'qrcode'])->name('bejana-tekan.qrcode');

    // Instalasi Hydrant Routes
    Route::resource('instalasi-hydrant', InstalasiHydrantController::class);
    Route::get('instalasi-hydrant/{id}/cetak', [InstalasiHydrantController::class, 'cetak'])->name('instalasi-hydrant.cetak');

    // Instalasi Listrik Routes
    Route::resource('instalasi-listrik', InstalasiListrikController::class);
    Route::get('instalasi-listrik/{id}/cetak', [InstalasiListrikController::class, 'cetak'])->name('instalasi-listrik.cetak');

    // Genset Routes
    Route::resource('genset', GensetController::class);
    Route::get('genset/{id}/cetak', [GensetController::class, 'cetak'])->name('genset.cetak');

    // Ketel Uap Routes
    Route::resource('ketel-uap', KetelUapController::class);
    Route::get('ketel-uap/{id}/cetak', [KetelUapController::class, 'cetak'])->name('ketel-uap.cetak');

    // Surat Izin Operator Routes
    Route::resource('surat-izin-operator', SuratIzinOperatorController::class);
    Route::get('surat-izin-operator/{id}/cetak', [SuratIzinOperatorController::class, 'cetak'])->name('suratIzinOperator.cetak');

    // Penyalur Petir Routes
    Route::resource('penyalur-petir', PenyalurPetirController::class);
    Route::get('penyalur-petir/{id}/cetak', [PenyalurPetirController::class, 'cetak'])->name('penyalur-petir.cetak');

    // Other Resources and Routes
    Route::resource('lain-lain', LainLainController::class);
    Route::resource('ga-archive', GaArchiveDataController::class);
    Route::get('ga-archive/qrcode/{id}', [GaArchiveDataController::class, 'qrcode'])->name('ga-archive.qrcode');
    // Tampilkan data berdasarkan unique_id dari QR code
    Route::get('/ga-archive/view/{unique_id}', [GaArchiveDataController::class, 'viewQr'])->name('ga-archive.view');


    Route::resource('vendor-archive', VendorArchiveDataController::class);
    Route::get('vendor-archive/qrcode/{id}', [VendorArchiveDataController::class, 'qrcode'])->name('vendor-archive.qrcode');

    Route::resource('vendor-form', VendorFormController::class);
    Route::get('vendor-form/{id}/cetak', [VendorFormController::class, 'cetak'])->name('vendor-form.cetak');

    Route::resource('report', ReportController::class);
    Route::get('/report/datamaster', [ReportController::class, 'datamaster'])->name('report.data-master');
    Route::get('/report/archive-data', [ReportController::class, 'archive'])->name('report.archive');
    Route::get('/report/cabinet_number', [ReportController::class, 'getCabinetNumber'])->name('get.cabinet.number');

    // Settings Routes
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('/setting', [SettingController::class, 'update'])->name('setting.update');

    // Notification Routes
    Route::delete('/notifications/{id}', function ($id) {
        auth()->user()->notifications()->findOrFail($id)->delete();
        Alert::success('Success', 'Berhasil Menghapus');
        return back();
    })->name('notifications.destroy');
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Useless Routes (for demonstration only)
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

// Auth Routes (Login, Register, etc.)
require __DIR__ . '/auth.php';
