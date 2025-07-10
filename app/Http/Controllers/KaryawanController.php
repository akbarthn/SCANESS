<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = User::whereIn('role', ['karyawan', 'admin'])->get();
        return view('karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'alamat' => 'nullable|string',
            'nomor_hp' => 'nullable|string|max:20',
            'foto' => 'nullable|image|max:2048',
            'role' => 'required|in:karyawan,admin'
        ]);

        $data = $request->only('nama', 'email', 'alamat', 'nomor_hp', 'role');
        $data['password'] = Hash::make($request->password);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_karyawan', 'public');
            $data['foto'] = $path;
        }

        User::create($data);

        return redirect()->route('karyawan.index')->with('success', 'Data berhasil ditambahkan.');
    }
}