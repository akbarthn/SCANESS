@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Tambah Absensi</h1>
        <form action="{{ route('absensi.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Dropdown Karyawan -->
            <div>
                <label for="user_id" class="block font-semibold">Karyawan</label>
                <select name="user_id" id="user_id" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach($users as $u)
                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Dropdown Shift -->
            <div>
                <label for="shift_id" class="block font-semibold">Shift</label>
                <select name="shift_id" id="shift_id" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">(Tidak ada)</option>
                    @foreach($shifts as $s)
                        <option value="{{ $s->id }}">{{ $s->nama_shift }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Input Tanggal -->
            <div>
                <label for="tanggal" class="block font-semibold">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Input Jam Masuk -->
            <div>
                <label for="jam_masuk" class="block font-semibold">Jam Masuk</label>
                <input type="time" name="jam_masuk" id="jam_masuk" value="{{ old('jam_masuk') }}" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Dropdown Status -->
            <div>
                <label for="status" class="block font-semibold">Status</label>
                <select name="status" id="status" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="hadir">Hadir</option>
                    <option value="izin">Izin</option>
                    <option value="alpha">Alpa</option>
                    <option value="terlambat">Terlambat</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                Simpan
            </button>
        </form>
    </div>
</div>
@endsection

<style>
    .container {
        max-width: 600px; /* Membatasi lebar maksimum kontainer */
    }
</style>