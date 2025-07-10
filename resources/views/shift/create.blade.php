@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
  <div class="bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-4 text-center">Tambah Shift Kerja</h1>

    <form action="{{ route('shift.store') }}" method="POST" class="space-y-4">
      @csrf

      <div>
        <label class="block font-semibold">Nama Shift</label>
        <input type="text" name="nama_shift" value="{{ old('nama_shift') }}"
               class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500">
        @error('nama_shift') <div class="text-red-600">{{ $message }}</div> @enderror
      </div>

      <div>
        <label class="block font-semibold">Jam Masuk</label>
        <input type="time" name="jam_masuk" value="{{ old('jam_masuk') }}"
               class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500">
        @error('jam_masuk') <div class="text-red-600">{{ $message }}</div> @enderror
      </div>

      <div>
        <label class="block font-semibold">Jam Keluar</label>
        <input type="time" name="jam_keluar" value="{{ old('jam_keluar') }}"
               class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500">
        @error('jam_keluar') <div class="text-red-600">{{ $message }}</div> @enderror
      </div>

      <button type="submit"
              class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-200">
        Simpan Shift
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