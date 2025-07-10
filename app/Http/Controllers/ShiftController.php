<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * List semua shift
     */
    public function index()
    {
        $shifts = Shift::orderBy('id')->get();
        return view('shift.index', compact('shifts'));
    }

    /**
     * Form buat shift
     */
    public function create()
    {
        return view('shift.create');
    }

    /**
     * Simpan shift baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_shift' => 'required|string|max:255',
            'jam_masuk'  => 'required',
            'jam_keluar' => 'required|after:jam_masuk',
        ]);

        Shift::create($validated);

        return redirect()->route('shift.index')->with('success', 'Shift berhasil dibuat.');
    }

    /**
     * Form edit shift
     */
    public function edit(Shift $shift)
    {
        return view('shift.edit', compact('shift'));
    }

    /**
     * Update shift
     */
    public function update(Request $request, Shift $shift)
    {
        $validated = $request->validate([
            'nama_shift' => 'required|string|max:255',
            'jam_masuk'  => 'required',
            'jam_keluar' => 'required|after:jam_masuk',
        ]);

        $shift->update($validated);

        return redirect()->route('shift.index')->with('success', 'Shift berhasil diperbarui.');
    }

    /**
     * Hapus shift
     */
    public function destroy(Shift $shift)
    {
        $shift->delete();
        return redirect()->route('shift.index')->with('success', 'Shift berhasil dihapus.');
    }
}
