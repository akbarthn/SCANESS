@extends('layouts.superadmin')
@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Data Jadwal</h1>
    <a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3">+ Tambah Jadwal</a>
    <table class="table-auto w-full border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Tanggal</th>
                <th class="border px-4 py-2">Nama Karyawan</th>
                <th class="border px-4 py-2">Shift</th>
                <th class="border px-4 py-2">Masuk</th>
                <th class="border px-4 py-2">Keluar</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwal as $jadwal)
            <tr>
                <td class="border px-4 py-2">{{ $jadwal->tanggal }}</td>
                <td class="border px-4 py-2">{{ $jadwal->user->nama }}</td>
                <td class="border px-4 py-2">{{ $jadwal->shift->nama }}</td>
                <td class="border px-4 py-2">{{ $jadwal->masuk ?? '-' }}</td>
                <td class="border px-4 py-2">{{ $jadwal->keluar ?? '-' }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus jadwal ini?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection