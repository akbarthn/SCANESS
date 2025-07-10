@extends('layouts.superadmin')
@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Data Karyawan / Super Admin</h1>
    <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">+ Tambah Karyawan</a>
    <table class="table-auto w-full border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Jabatan</th>
                <th class="border px-4 py-2">Alamat</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Telepon</th>
            </tr>
        </thead>
        <tbody>
            @foreach($karyawans as $karyawan)
            <tr>
                <td class="border px-4 py-2">{{ $karyawan->nama }}</td>
                <td class="border px-4 py-2">{{ ucfirst($karyawan->role) }}</td>
                <td class="border px-4 py-2">{{ $karyawan->alamat ?? '-' }}</td>
                <td class="border px-4 py-2">{{ $karyawan->email }}</td>
                <td class="border px-4 py-2">{{ $karyawan->nomor_hp ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
