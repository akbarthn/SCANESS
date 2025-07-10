<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use App\Models\Shift;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with(['user', 'shift'])
            ->orderBy('tanggal', 'desc')
            ->get();
        return view('jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $shifts = Shift::orderBy('nama_shift')->get();
        $users = User::where('role', 'karyawan')->get();
        return view('jadwal.create', compact('shifts', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'  => 'required|exists:users,id',
            'shift_id' => 'required|exists:shift,id',
            'tanggal'  => 'required|date',
        ]);

        Jadwal::create($validated);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dibuat.');
    }

    public function show(Jadwal $jadwal)
    {
        return view('jadwal.show', compact('jadwal'));
    }

    public function edit(Jadwal $jadwal)
    {
        $shifts = Shift::orderBy('nama_shift')->get();
        $users = User::where('role', 'karyawan')->get();
        return view('jadwal.edit', compact('jadwal', 'shifts', 'users'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $validated = $request->validate([
            'user_id'  => 'required|exists:users,id',
            'shift_id' => 'required|exists:shift,id',
            'tanggal'  => 'required|date',
        ]);

        $jadwal->update($validated);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
