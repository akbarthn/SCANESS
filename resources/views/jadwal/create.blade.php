@extends('layouts.superadmin')

@section('content')
<div class="container mx-auto p-6 max-w-md">
  <h1 class="text-2xl font-bold mb-4">Buat Jadwal Kerja</h1>

  @if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 p-4 mb-4 rounded">
      <ul class="list-disc pl-5">
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('jadwal.store') }}" method="POST" class="space-y-4">
    @csrf

    {{-- Pilih Karyawan --}}
    <div>
      <label for="user_id" class="block font-medium">Karyawan</label>
      <select name="user_id" id="user_id" class="w-full border rounded p-2" required>
        <option value="">-- Pilih Karyawan --</option>
        @foreach($users as $u)
          <option value="{{ $u->id }}"
            {{ old('user_id') == $u->id ? 'selected' : '' }}>
            {{ $u->nama }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- Pilih Shift --}}
    <div>
      <label for="shift_id" class="block font-medium">Shift</label>
      <select name="shift_id" id="shift_id" class="w-full border rounded p-2" required>
        <option value="">-- Pilih Shift --</option>
        @foreach($shift as $s)
          <option value="{{ $s->id }}"
            {{ old('shift_id') == $s->id ? 'selected' : '' }}>
            {{ $s->nama }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- Tanggal --}}
    <div>
      <label for="tanggal" class="block font-medium">Tanggal</label>
      <input type="date" name="tanggal" id="tanggal"
             value="{{ old('tanggal') }}"
             class="w-full border rounded p-2" required>
    </div>

    {{-- Submit --}}
    <div class="flex justify-end">
      <button type="submit"
              class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Simpan Jadwal
      </button>
    </div>
  </form>
</div>
@endsection