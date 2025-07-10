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
            ->paginate(10);

        return view('jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $users = User::where('role', 'karyawan')->get();
        $shifts = Shift::orderBy('nama')->get();

        return view('jadwal.create', compact('users', 'shifts'));
    }

    public function store(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            // user_id bisa single atau array
            'id_user'   => 'required',
            'id_shift'  => 'required|exists:shift,id',
            'tanggal'   => 'required|date',
        ]);

        // Pastikan user_id adalah array
        $userIds = is_array($validated['id_user'])
            ? $validated['id_user']
            : [$validated['id_user']];

        // Simpan untuk tiap karyawan
        foreach ($userIds as $userId) {
            Jadwal::create([
                'id_user'  => $userId,
                'id_shift' => $validated['id_shift'],
                'tanggal'  => $validated['tanggal'],
            ]);
        }

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dibuat.');
    }

    public function edit(Jadwal $jadwal)
    {
        $shifts = Shift::orderBy('nama')->get();
        $users = User::where('role', 'karyawan')->get();

        return view('jadwal.edit', compact('jadwal', 'shifts', 'users'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        // Validasi
        $validated = $request->validate([
            'id_user'   => 'required|integer|exists:users,id',
            'id_shift'  => 'required|exists:shift,id',
            'tanggal'   => 'required|date',
        ]);

        // Update
        $jadwal->update([
            'id_user'  => $validated['id_user'],
            'id_shift' => $validated['id_shift'],
            'tanggal'  => $validated['tanggal'],
        ]);

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}
