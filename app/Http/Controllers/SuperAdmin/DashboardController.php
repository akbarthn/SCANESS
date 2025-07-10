<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Shift;
use App\Models\Jadwal;
use App\Models\Absensi;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Total karyawan dengan role 'karyawan'
        $totalKaryawan = User::where('role', 'karyawan')->count();

        // Total shift kerja yang tersedia
        $totalShift = Shift::count();

        // Tanggal hari ini
        $today = Carbon::today();

        // Total jadwal kerja hari ini
        $jadwalHariIni = Jadwal::whereDate('tanggal', $today)->count();

        // Jumlah kehadiran hari ini (status = hadir)
        $hadirHariIni = Absensi::whereDate('tanggal', $today)
            ->where('status', 'hadir')
            ->count();

        // Ambil absensi hari ini (10 data terbaru)
        $absensiHariIni = Absensi::with(['user', 'shift'])
            ->whereDate('tanggal', $today)
            ->latest()
            ->take(10)
            ->get();

        // Kirim data ke view dashboard
        return view('superadmin.dashboard', compact(
            'totalKaryawan',
            'totalShift',
            'jadwalHariIni',
            'hadirHariIni',
            'absensiHariIni'
        ));
    }
}
