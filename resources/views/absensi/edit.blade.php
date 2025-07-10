@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-md">
  <h1 class="text-2xl font-bold mb-4">Edit Kehadiran</h1>

  @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 p-4 mb-4 rounded">
      <ul class="list-disc pl-5">
        @foreach ($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('absensi.update', $absensi->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    {{-- Karyawan (readonly) --}}
    <div>
      <label class="block font-medium">Karyawan</label>
      <input type="text" class="w-full border rounded p-2 bg-gray-100" value="{{ $absensi->user->nama }}" readonly>
    </div>

    {{-- Shift (readonly) --}}
    <div>
      <label class="block font-medium">Shift</label>
      <input type="text" class="w-full border rounded p-2 bg-gray-100" value="{{ $absensi->shift->nama ?? '-' }}" readonly>
    </div>

    {{-- Jam Masuk --}}
    <div>
      <label for="jam_masuk" class="block font-medium">Jam Masuk</label>
      <input type="datetime-local" id="jam_masuk" name="jam_masuk"
        value="{{ old('jam_masuk', optional($absensi->jam_masuk)->format('Y-m-d\TH:i')) }}"
        class="w-full border rounded p-2" required>
    </div>

    {{-- Status --}}
    <div>
      <label for="status" class="block font-medium">Status</label>
      <select name="status" id="status" class="w-full border rounded p-2" required>
        <option value="">-- Pilih Status --</option>
        @foreach(['hadir', 'terlambat', 'alpa'] as $st)
          <option value="{{ $st }}" {{ old('status', $absensi->status) === $st ? 'selected' : '' }}>
            {{ ucfirst($st) }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- Tombol --}}
    <div class="flex justify-end space-x-2">
      <a href="{{ route('absensi.index') }}"
         class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
      <button type="submit"
              class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
    </div>
  </form>
</div>
@endsection
