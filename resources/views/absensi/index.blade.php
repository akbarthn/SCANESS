@extends('layouts.app')
@section('content')
<h1>Daftar Absensi</h1>
<a href="{{ route('absensi.create') }}" class="btn btn-primary mb-3">Tambah Absensi</a>
<table class="table">
  <thead>
    <tr>
      <th>Tanggal</th><th>Karyawan</th><th>Shift</th><th>Jam Masuk</th><th>Status</th><th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($absensis as $a)
    <tr>
      <td>{{ $a->tanggal }}</td>
      <td>{{ $a->user->name }}</td>
      <td>{{ $a->shift->nama_shift ?? '-' }}</td>
      <td>{{ $a->jam_masuk }}</td>
      <td>{{ ucfirst($a->status) }}</td>
      <td>
        <a href="{{ route('absensi.edit', $a) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('absensi.destroy', $a) }}" method="POST" class="d-inline">
          @csrf @method('DELETE')
          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus absensi ini?')">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $absensis->links() }}
@endsection
