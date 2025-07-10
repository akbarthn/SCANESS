<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class KaryawanController extends Controller
{
    // Menampilkan daftar karyawan
    public function index()
    {
        $karyawans = User::where('role', 'karyawan')->get();
        return view('superadmin.karyawan.index', compact('karyawans'));
    }

    // Menampilkan form tambah karyawan
    public function create()
    {
        $roles = ['superadmin', 'admin', 'karyawan'];
        return view('superadmin.karyawan.create', compact('roles'));
    }

    // Menyimpan karyawan baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role'     => ['required', Rule::in(['superadmin', 'admin', 'karyawan'])],
        ]);

        // Simpan karyawan baru ke database
        User::create([
            'nama'     => $validated['nama'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => $validated['role'],
        ]);

        return redirect()->route('superadmin.karyawan.index')
                        ->with('success', 'Karyawan berhasil ditambahkan.');
    }

    // Form edit karyawan
    public function edit($id)
    {
        $karyawan = User::findOrFail($id);
        $roles = ['superadmin', 'admin', 'karyawan'];
        return view('superadmin.karyawan.edit', compact('karyawan','roles'));
    }

    // Update data karyawan
    public function update(Request $request, $id)
    {
        $karyawan = User::findOrFail($id);

        $validated = $request->validate([
        'nama'      => 'required|string|max:255',
        'email'     => 'required|email|unique:users,email,' . $id,
        'password'  => 'nullable|string|min:6',
        'role'      => 'required|in:superadmin,admin,karyawan',
        'alamat'    => 'nullable|string',
        'nomor_hp'  => 'nullable|string',
        ]);

        $karyawan->fill($validated);

        if ($request->filled('password')) {
            $karyawan->password = Hash::make($validated['password']);
        }

        $karyawan->save();


        return redirect()->route('superadmin.karyawan.index')->with('success', 'Karyawan berhasil diperbarui.');
    }

    // Hapus karyawan
    public function destroy($id)
    {
        $karyawan = User::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('superadmin.karyawan.index')->with('success', 'Karyawan berhasil dihapus.');
    }
}
