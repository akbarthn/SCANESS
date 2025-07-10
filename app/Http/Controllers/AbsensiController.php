<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\User;
use App\Models\Shift;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensis = Absensi::with(['user', 'shift'])
            ->orderBy('tanggal', 'desc')
            ->paginate(20);

        return view('absensi.index', compact('absensis'));
    }

    public function create()
    {
        $users = User::where('role', 'karyawan')->get();
        $shifts = Shift::all();

        return view('absensi.create', compact('users', 'shifts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'   => 'required|exists:users,id',
            'shift_id'  => 'nullable|exists:shift,id',
            'tanggal'   => 'required|date',
            'jam_masuk' => 'nullable|date_format:H:i',
            'status'    => 'required|in:hadir,izin,alpha,terlambat',
        ]);

        Absensi::create($validated);

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil disimpan.');
    }

    public function edit(Absensi $absensi)
    {
        $users = User::where('role', 'karyawan')->get();
        $shifts = Shift::all();

        return view('absensi.edit', compact('absensi', 'users', 'shifts'));
    }

    public function update(Request $request, Absensi $absensi)
    {
        $validated = $request->validate([
            'user_id'   => 'required|exists:users,id',
            'shift_id'  => 'nullable|exists:shift,id',
            'tanggal'   => 'required|date',
            'jam_masuk' => 'nullable|date_format:H:i',
            'status'    => 'required|in:hadir,izin,alpha,terlambat',
        ]);

        $absensi->update($validated);

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil diperbarui.');
    }

    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil dihapus.');
    }
}
