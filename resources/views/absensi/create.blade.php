@extends('layouts.app')
@section('content')
<h1>Tambah Absensi</h1>
<form action="{{ route('absensi.store') }}" method="POST">
  @csrf
  <!-- Dropdown Karyawan -->
  <select name="user_id">
    @foreach($users as $u)
      <option value="{{ $u->id }}">{{ $u->name }}</option>
    @endforeach
  </select>
  <!-- Dropdown shift -->
  <select name="shift_id">
    <option value="">(Tidak ada)</option>
    @foreach($shifts as $s)
      <option value="{{ $s->id }}">{{ $s->nama_shift }}</option>
    @endforeach
  </select>
  <input type="date" name="tanggal" value="{{ old('tanggal') }}">
  <input type="time" name="jam_masuk" value="{{ old('jam_masuk') }}">
  <select name="status">
    <option value="hadir">Hadir</option>
    <option value="izin">Izin</option>
    <option value="alpha">Alpa</option>
    <option value="terlambat">Terlambat</option>
  </select>
  <button type="submit">Simpan</button>
</form>
@endsection
