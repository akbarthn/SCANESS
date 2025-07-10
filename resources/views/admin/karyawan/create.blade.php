@extends('layouts.admin')

@section('title', 'Tambah Karyawan')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-700">Form Tambah Karyawan</h1>

    <form action="{{ route('admin.karyawan.store') }}" method="POST" class="bg-white p-6 rounded shadow-md w-full md:w-1/2">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Nama</label>
            <input type="text" name="nama" class="w-full px-4 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full px-4 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Password</label>
            <input type="password" name="password" class="w-full px-4 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Alamat</label>
            <input type="text" name="alamat" class="w-full px-4 py-2 border rounded">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700">Nomor HP</label>
            <input type="text" name="nomor_hp" class="w-full px-4 py-2 border rounded">
        </div>

        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
            Simpan
        </button>

        <a href="{{ route('admin.dashboard') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
    </form>
</div>
@endsection
