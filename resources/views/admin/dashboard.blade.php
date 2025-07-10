@extends('layouts.admin')

@section('title', 'Dashboard Admin - Absensi Café')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard Admin</h1>

    <!-- Ringkasan -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Jumlah Karyawan -->
<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-xl font-semibold text-gray-700">Jumlah Karyawan</h2>
    <p class="text-3xl font-bold text-blue-600 mt-2">{{ $jumlahKaryawan }}</p>

    <div class="mt-4">
        <!-- Tombol Tambah Karyawan -->
        <a href="{{ route('admin.karyawan.create') }}" 
           class="inline-block w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
            + Tambah Karyawan
        </a>

        <!-- Tombol Lihat Karyawan -->
        <a href="{{ route('admin.karyawan.index') }}" 
           class="inline-block w-full mt-2 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
            👥 Lihat Data Karyawan
        </a>
    </div>
</div>



        <!-- Shift Hari Ini -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-700">Shift Hari Ini</h2>
            <p class="text-3xl font-bold text-green-600 mt-2">{{ $jumlahShiftHariIni }}</p>
        </div>

        <!-- Total Jadwal -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-700">Total Jadwal Tersimpan</h2>
            <p class="text-3xl font-bold text-indigo-600 mt-2">{{ $totalJadwal }}</p>
        </div>
    </div>

    <!-- Tabel Jadwal Hari Ini -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Jadwal Hari Ini ({{ date('d M Y') }})</h2>

        @if($jadwalHariIni->isEmpty())
            <p class="text-gray-600">Tidak ada jadwal untuk hari ini.</p>
        @else
            <div class="overflow-auto">
                <table class="min-w-full border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="text-left px-4 py-2 border-b">Nama Karyawan</th>
                            <th class="text-left px-4 py-2 border-b">Shift</th>
                            <th class="text-left px-4 py-2 border-b">Jam Masuk</th>
                            <th class="text-left px-4 py-2 border-b">Jam Keluar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwalHariIni as $jadwal)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border-b">{{ $jadwal->user->nama ?? '-' }}</td>
                            <td class="px-4 py-2 border-b">{{ $jadwal->shift->nama ?? '-' }}</td>
                            <td class="px-4 py-2 border-b">{{ $jadwal->masuk ?? '-' }}</td>
                            <td class="px-4 py-2 border-b">{{ $jadwal->keluar ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Logout -->
    <div class="mt-8">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                Logout
            </button>
        </form>
    </div>
</div>
@endsection
