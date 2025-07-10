@extends('layouts.app')
@section('content')
<h1>Buat Jadwal Kerja</h1>
<form action="{{ route('jadwal.store') }}" method="POST">
  @csrf
  <select name="user_id">
    @foreach($users as $u)
      <option value="{{ $u->id }}">{{ $u->name }}</option>
    @endforeach
  </select>
  <select name="shift_id">
    @foreach($shifts as $s)
      <option value="{{ $s->id }}">{{ $s->nama_shift }}</option>
    @endforeach
  </select>
  <input type="date" name="tanggal">
  <button type="submit">Simpan</button>
</form>
@endsection
