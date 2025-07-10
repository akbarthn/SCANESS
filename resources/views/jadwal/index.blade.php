@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Jadwal Kerja</h1>
        <a href="{{ route('jadwal.create') }}"
           class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
           Tambah Jadwal
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($jadwals->isEmpty())
        <p class="text-gray-600">Belum ada jadwal yang dibuat.</p>
    @else
        <table class="min-w-full bg-white border rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Tanggal</th>
                    <th class="px-4 py-2 border">Karyawan</th>
                    <th class="px-4 py-2 border">Shift</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jadwals as $jadwal)
                    <tr>
                        <td class="px-4 py-2 border">{{ $jadwal->id }}</td>
                        <td class="px-4 py-2 border">{{ $jadwal->tanggal }}</td>
                        <td class="px-4 py-2 border">{{ $jadwal->user->nama }}</td>
                        <td class="px-4 py-2 border">{{ $jadwal->shift->nama_shift }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('jadwal.edit', $jadwal->id) }}"
                               class="text-blue-600 hover:underline mr-2">Edit</a>
                            <form action="{{ route('jadwal.destroy', $jadwal->id) }}"
                                  method="POST"
                                  class="inline"
                                  onsubmit="return confirm('Hapus jadwal ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination jika data banyak --}}
        <div class="mt-4">
            {{ $jadwals->links() }}
        </div>
    @endif
</div>
@endsection
