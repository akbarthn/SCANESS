<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class KaryawanController extends Controller
{
    public function create()
    {
        return view('admin.karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'alamat' => 'nullable|string',
            'nomor_hp' => 'nullable|string|max:20',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
            'nomor_hp' => $request->nomor_hp,
            'role' => 'karyawan',
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Karyawan berhasil ditambahkan.');
    }

        public function index()
    {
        $karyawan = \App\Models\User::where('role', 'karyawan')->get();

        return view('admin.karyawan.index', compact('karyawan'));
    }

}