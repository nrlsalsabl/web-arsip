<?php

namespace App\Http\Controllers;

use App\Models\ArchiveLoan;
use App\Models\GaArchiveData;
use App\Models\User;
use App\Models\VendorArchiveData;
use Illuminate\Http\Request;

class ArchiveLoanController extends Controller
{

    public function index()
{
    $archiveLoans = ArchiveLoan::with(['user', 'gaArchive', 'vendorArchive'])->latest()->get();

    return view('pages.archiveLoan.index', compact('archiveLoans'));
}


    public function create()
    {
        $users = User::all();
        $gaArchives = GaArchiveData::all();
        $vendorArchives = VendorArchiveData::all();

        return view('pages.archiveLoan.create', compact('users', 'gaArchives', 'vendorArchives'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'archive_type' => 'required|in:ga,vendor',
            'archive_id' => 'required|integer',
            'loan_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:loan_date',
        ]);

        $user = User::find($request->user_id);
        $department = $user->departemen ?? '-';
        $documentName = null;

        if ($request->archive_type === 'ga') {
            $archive = GaArchiveData::find($request->archive_id);
            if (!$archive) {
                return back()->withErrors(['archive_id' => 'Dokumen GA tidak ditemukan.']);
            }
            $documentName = $archive->document_name;
        } elseif ($request->archive_type === 'vendor') {
            $archive = VendorArchiveData::find($request->archive_id);
            if (!$archive) {
                return back()->withErrors(['archive_id' => 'Dokumen Vendor tidak ditemukan.']);
            }
            $documentName = $archive->document_number;
        }

        ArchiveLoan::create([
            'user_id' => $request->user_id,
            'archive_type' => $request->archive_type,
            'archive_id' => $request->archive_id,
            'document_name' => $documentName,
            'department' => $department,
            'loan_date' => $request->loan_date,
            'return_date' => $request->return_date,
        ]);

        return redirect()->route('archive-loan.index')->with('success', 'Data peminjaman berhasil disimpan.');
    }

    public function edit($id)
    {
        $loan = ArchiveLoan::findOrFail($id);
        $users = User::all();
        $gaArchives = GaArchiveData::all();
        $vendorArchives = VendorArchiveData::all();

        return view('pages.archiveLoan.edit', compact('loan', 'users', 'gaArchives', 'vendorArchives'));
    }

    public function update(Request $request, $id)
    {
        $loan = ArchiveLoan::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'archive_type' => 'required|in:ga,vendor',
            'archive_id' => 'required|integer',
            'loan_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:loan_date',
        ]);

        $user = User::find($request->user_id);
        $department = $user->departemen ?? '-';
        $documentName = null;

        if ($request->archive_type === 'ga') {
            $archive = GaArchiveData::find($request->archive_id);
            if (!$archive) {
                return back()->withErrors(['archive_id' => 'Dokumen GA tidak ditemukan.']);
            }
            $documentName = $archive->document_name;
        } elseif ($request->archive_type === 'vendor') {
            $archive = VendorArchiveData::find($request->archive_id);
            if (!$archive) {
                return back()->withErrors(['archive_id' => 'Dokumen Vendor tidak ditemukan.']);
            }
            $documentName = $archive->document_number;
        }

        $loan->update([
            'user_id' => $request->user_id,
            'archive_type' => $request->archive_type,
            'archive_id' => $request->archive_id,
            'document_name' => $documentName,
            'department' => $department,
            'loan_date' => $request->loan_date,
            'return_date' => $request->return_date,
        ]);

        return redirect()->route('archive-loan.index')->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $loan = ArchiveLoan::findOrFail($id);
        $loan->delete();

        return redirect()->route('archive-loan.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
