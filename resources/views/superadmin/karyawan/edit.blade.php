@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-lg">
  <h1 class="text-2xl font-bold mb-6">Edit Akun Karyawan</h1>

  @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-6 rounded">
      {{ session('success') }}
    </div>
  @endif

  <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    {{-- Nama --}}
    <div>
      <label for="nama" class="block font-medium">Nama</label>
      <input type="text" name="nama" id="nama"
             value="{{ old('nama', $karyawan->nama) }}"
             class="w-full border rounded p-2"
             required>
      @error('nama')
      <p class="text-sm text-red-600">{{ $message }}</p>
      @enderror
    </div>

    {{-- Email --}}
    <div>
      <label for="email" class="block font-medium">Email</label>
      <input type="email" name="email" id="email"
             value="{{ old('email', $karyawan->email) }}"
             class="w-full border rounded p-2"
             required>
      @error('email')
      <p class="text-sm text-red-600">{{ $message }}</p>
      @enderror
    </div>

    {{-- Role --}}
    <div>
      <label for="role" class="block font-medium">Role</label>
        <select name="role" id="role" required>
        <option value="">-- Pilih Role --</option>
        @foreach($roles as $r)
            <option value="{{ $r }}" {{ old('role') == $r ? 'selected' : '' }}>
            {{ ucfirst($r) }}
            </option>
        @endforeach
        </select>
      @error('role')
      <p class="text-sm text-red-600">{{ $message }}</p>
      @enderror
    </div>

    {{-- Password --}}
    <div>
      <label for="password" class="block font-medium">Password Baru (opsional)</label>
      <input type="password" name="password" id="password"
             class="w-full border rounded p-2">
      <small class="text-gray-600">Kosongkan jika tidak ingin mengubah password.</small>
      @error('password')
      <p class="text-sm text-red-600">{{ $message }}</p>
      @enderror
    </div>

    {{-- Submit --}}
    <div class="flex justify-end">
      <button type="submit"
              class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Simpan Perubahan
      </button>
    </div>
  </form>
</div>
@endsection
