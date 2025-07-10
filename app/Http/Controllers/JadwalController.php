<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\User;
use App\Models\Shift;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::with(['users','shift'])->orderby('tanggal', 'desc')->get();
        return view('jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'karyawan')->get();
        $shift = Shift::all();
        return view('jadwal.create', compact('users', 'shift'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'shift_id' => 'required|exists:shift,id',
        ]);

        Jadwal::create($request->only('tanggal', 'id_users', 'id_shift'));

        return redirect()->route('jadwal.index')->with('success', 'Jadwal created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $users = User::where('role', 'karyawan')->get();
        $shifts = Shift::all();
        return view('jadwal.edit', compact('jadwal', 'users', 'shifts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'id_user' => 'required|exists:users,id',
            'id_shift' => 'required|exists:shift,id',
        ]);

        $jadwal->update($request->only('tanggal', 'id_user', 'id_shift'));

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
