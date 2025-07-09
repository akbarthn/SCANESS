<?php

namespace App\Http\Controllers;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JadwalKaryawan extends Controller
{
    public function index()
    {
        // Mengambil data jadwal karyawan berdasarkan ID user yang sedang login
        $jadwal = Jadwal::where('id_user', Auth::id())->with('shift')->get();
        
        return view('karyawan.jadwal', compact('jadwal'));
    }
}
