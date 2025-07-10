@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Dashboard Superadmin</h1>

    {{-- Cards Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-4 rounded shadow">
            <div class="text-gray-500">Total Karyawan</div>
            <div class="text-xl font-bold">{{ $totalKaryawan }}</div>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <div class="text-gray-500">Total Shift</div>
            <div class="text-xl font-bold">{{ $totalShift }}</div>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <div class="text-gray-500">Jadwal Hari Ini</div>
            <div class="text-xl font-bold">{{ $jadwalHariIni }}</div>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <div class="text-gray-500">Hadir Hari Ini</div>
            <div class="text-xl font-bold">{{ $hadirHariIni }}</div>
        </div>
    </div>

    {{-- Aksi Cepat --}}
    <div class="flex gap-4 mb-6">
        <a href="{{ route('karyawan.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Buat Akun Karyawan</a>
        <a href="{{ route('shift.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Buat Shift Kerja</a>
        <a href="{{ route('jadwal.create') }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Buat Jadwal Kerja</a>
        <a href="{{ route('absensi.index') }}" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">Lihat Kehadiran</a>
    </div>

    {{-- Tabel Kehadiran Hari Ini --}}
    <div class="bg-white shadow rounded p-4">
        <h2 class="text-lg font-semibold mb-2">Kehadiran Hari Ini</h2>
        <table class="w-full text-sm text-left border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">Nama</th>
                    <th class="p-2 border">Shift</th>
                    <th class="p-2 border">Jam Masuk</th>
                    <th class="p-2 border">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($absensiHariIni as $absen)
                    <tr class="border-t">
                        <td class="p-2">{{ $absen->user->nama ?? '-' }}</td>
                        <td class="p-2">{{ $absen->shift->nama ?? '-' }}</td>
                        <td class="p-2">{{ optional($absen->jam_masuk)->format('H:i') ?? '-' }}</td>
                        <td class="p-2">{{ ucfirst($absen->status) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center p-2 text-gray-500">Belum ada data kehadiran hari ini</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
