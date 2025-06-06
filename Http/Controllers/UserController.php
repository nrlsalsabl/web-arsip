<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nik' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'jabatan' => 'required',
            'departemen' => 'required',
            'role' => 'required',
        ]);

        try {
            User::create([
                'name' => $request->name,
                'nik' => $request->nik,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'jabatan' => $request->jabatan,
                'departemen' => $request->departemen,
                'role' => $request->role,
            ]);

            Alert::success('Berhasil', 'User berhasil ditambahkan');
            return redirect()->route('user.index');
        } catch (Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menambahkan user');
            return back()->withInput();
        }
    }

    public function show(string $id)
    {
        try {
            $user = User::findOrFail($id);
            return view('pages.user.show', compact('user'));
        } catch (Exception $e) {
            Alert::error('Gagal', 'User tidak ditemukan');
            return redirect()->route('user.index');
        }
    }

    public function edit(string $id)
    {
        try {
            $user = User::findOrFail($id);
            return view('pages.user.edit', compact('user'));
        } catch (Exception $e) {
            Alert::error('Gagal', 'User tidak ditemukan');
            return redirect()->route('user.index');
        }
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'nik' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'jabatan' => 'required',
            'departemen' => 'required',
            'role' => 'required',
        ]);

        try {
            $user = User::findOrFail($id);

            $user->update([
                'name' => $request->name,
                'nik' => $request->nik,
                'email' => $request->email,
                'jabatan' => $request->jabatan,
                'departemen' => $request->departemen,
                'role' => $request->role,
            ]);

            if ($request->filled('password')) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            Alert::success('Berhasil', 'User berhasil diperbarui');
            return redirect()->route('user.index');
        } catch (Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat memperbarui user');
            return back()->withInput();
        }
    }

    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            Alert::success('Berhasil', 'User berhasil dihapus');
            return redirect()->route('user.index');
        } catch (Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus user');
            return redirect()->route('user.index');
        }
    }
}
