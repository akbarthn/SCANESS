@extends('layouts.admin')

@section('title', 'Data Karyawan')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-700">Data Karyawan</h1>

    <div class="overflow-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b text-left">Nama</th>
                    <th class="px-4 py-2 border-b text-left">Email</th>
                    <th class="px-4 py-2 border-b text-left">Nomor HP</th>
                    <th class="px-4 py-2 border-b text-left">Alamat</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($karyawan as $data)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">{{ $data->nama }}</td>
                    <td class="px-4 py-2 border-b">{{ $data->email }}</td>
                    <td class="px-4 py-2 border-b">{{ $data->nomor_hp ?? '-' }}</td>
                    <td class="px-4 py-2 border-b">{{ $data->alamat ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-4 text-center text-gray-500">Belum ada data karyawan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline">&larr; Kembali ke Dashboard</a>
    </div>
</div>
@endsection
