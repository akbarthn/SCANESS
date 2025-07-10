<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shift;

class ShiftController extends Controller
{
    public function index()
    {
        $shifts = Shift::all();
        return view('shift.index', compact('shifts'));
    }

    public function create()
    {
        return view('shift.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'start' => 'required|date_format:H:i',
            'end' => 'required|date_format:H:i',
        ]);

        Shift::create($request->only('nama', 'start', 'end'));

        return redirect()->route('shift.index')->with('success', 'Shift berhasil ditambahkan.');
    }

    public function edit(Shift $shift)
    {
        return view('shift.edit', compact('shift'));
    }

    public function update(Request $request, Shift $shift)
    {
        $request->validate([
            'nama' => 'required|string',
            'start' => 'required|date_format:H:i',
            'end' => 'required|date_format:H:i',
        ]);

        $shift->update($request->only('nama', 'start', 'end'));

        return redirect()->route('shift.index')->with('success', 'Shift berhasil diperbarui.');
    }

    public function destroy(Shift $shift)
    {
        $shift->delete();
        return redirect()->route('shift.index')->with('success', 'Shift berhasil dihapus.');
    }
}
