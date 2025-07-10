@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-md">
  <h1 class="text-2xl font-bold mb-4">Edit Jadwal Kerja</h1>

  @if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 p-4 mb-4 rounded">
      <ul class="list-disc pl-5">
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    {{-- Pilih Karyawan --}}
    <div>
      <label for="id_user" class="block font-medium">Karyawan</label>
      <select name="id_user" id="id_user" class="w-full border rounded p-2" required>
        <option value="">-- Pilih Karyawan --</option>
        @foreach($users as $u)
          <option 
            value="{{ $u->id }}" 
            {{ old('id_user', $jadwal->id_user) == $u->id ? 'selected' : '' }}>
            {{ $u->nama }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- Pilih Shift --}}
    <div>
      <label for="id_shift" class="block font-medium">Shift</label>
      <select name="id_shift" id="id_shift" class="w-full border rounded p-2" required>
        <option value="">-- Pilih Shift --</option>
        @foreach($shifts as $s)
          <option 
            value="{{ $s->id }}"
            {{ old('id_shift', $jadwal->id_shift) == $s->id ? 'selected' : '' }}>
            {{ $s->nama }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- Tanggal --}}
    <div>
      <label for="tanggal" class="block font-medium">Tanggal</label>
      <input type="date" name="tanggal" id="tanggal"
             value="{{ old('tanggal', $jadwal->tanggal->format('Y-m-d')) }}"
             class="w-full border rounded p-2" required>
    </div>

    {{-- Tombol --}}
    <div class="flex justify-end space-x-2">
      <a href="{{ route('jadwal.index') }}"
         class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
        Batal
      </a>
      <button type="submit"
              class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Update Jadwal
      </button>
    </div>
  </form>
</div>
@endsection
