<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role; // <-- Tambahkan ini
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    // Menampilkan daftar karyawan
    public function index()
    {
        $karyawans = User::where('role', 'karyawan')->get();
        return view('karyawan.index', compact('karyawans'));
    }

    // Menampilkan form tambah karyawan
    public function create()
    {
        $roles = Role::pluck('name'); // ambil nama role
        return view('karyawan.create', compact('roles'));
    }

    // Menyimpan karyawan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role'     => 'required|exists:roles,name', // validasi role
        ]);

        User::create([
            'nama'     => $validated['nama'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => $validated['role'],
        ]);

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }

    // Form edit karyawan
    public function edit($id)
    {
        $karyawan = User::findOrFail($id);
        $roles = Role::pluck('name');
        return view('karyawan.edit', compact('karyawan', 'roles'));
    }

    // Update data karyawan
    public function update(Request $request, $id)
    {
        $karyawan = User::findOrFail($id);

        $validated = $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'role'     => 'required|exists:roles,name',
        ]);

        $karyawan->nama  = $validated['nama'];
        $karyawan->email = $validated['email'];
        $karyawan->role  = $validated['role'];

        if ($request->filled('password')) {
            $karyawan->password = Hash::make($validated['password']);
        }

        $karyawan->save();

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diperbarui.');
    }

    // Hapus karyawan
    public function destroy($id)
    {
        $karyawan = User::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus.');
    }
}
