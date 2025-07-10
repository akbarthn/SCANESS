<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $jumlahKaryawan = User::where('role', 'karyawan')->count();

        $tanggalHariIni = now()->toDateString();

        $jumlahShiftHariIni = Jadwal::where('tanggal', $tanggalHariIni)->count();

        $totalJadwal = Jadwal::count();

        $jadwalHariIni = Jadwal::with(['user', 'shift'])
            ->where('tanggal', $tanggalHariIni)
            ->get();

        return view('admin.dashboard', compact(
            'jumlahKaryawan',
            'jumlahShiftHariIni',
            'totalJadwal',
            'jadwalHariIni'
        ));
    }
}
