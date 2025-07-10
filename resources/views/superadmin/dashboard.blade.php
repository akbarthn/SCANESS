@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Dashboard Superadmin</h1>

    {{-- Cards --}}
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
        <a href="{{ route('karyawan.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Buat Akun Karyawan</a>
        <a href="{{ route('shift.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Buat Shift Kerja</a>
        <a href="{{ route('jadwal.create') }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Buat Jadwal Kerja</a>
        <a href="{{ route('absensi.index') }}" class="bg-indigo-500 text-white px-4 py-2 rounded">Lihat Kehadiran</a>
    </div>

    {{-- Tabel Kehadiran --}}
    <div class="bg-white shadow rounded p-4">
        <h2 class="text-lg font-semibold mb-2">Kehadiran Hari Ini</h2>
        <table class="w-full text-sm text-left">
            <thead>
                <tr>
                    <th class="p-2">Nama</th>
                    <th class="p-2">Shift</th>
                    <th class="p-2">Jam Masuk</th>
                    <th class="p-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($absensiHariIni as $absen)
                    <tr class="border-t">
                        <td class="p-2">{{ $absen->user->name ?? '-' }}</td>
                        <td class="p-2">{{ $absen->shift->nama_shift ?? '-' }}</td>
                        <td class="p-2">{{ $absen->jam_masuk ?? '-' }}</td>
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
