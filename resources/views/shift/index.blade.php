@extends('layouts.app')
@section('content')
<h1>Daftar Shift Kerja</h1>
<a href="{{ route('shift.create') }}" class="btn btn-primary">Tambah Shift</a>
<table>
  <thead><tr><th>ID</th><th>Nama Shift</th><th>Dari</th><th>Sampai</th><th>Aksi</th></tr></thead>
  <tbody>
    @foreach($shifts as $s)
    <tr>
      <td>{{ $s->id }}</td>
      <td>{{ $s->nama_shift }}</td>
      <td>{{ $s->jam_masuk }}</td>
      <td>{{ $s->jam_keluar }}</td>
      <td>
        <a href="{{ route('shift.edit', $s) }}">Edit</a>
        <form action="{{ route('shift.destroy', $s) }}" method="POST" style="display:inline">
          @csrf @method('DELETE')
          <button type="submit" onclick="return confirm('Hapus shift ini?')">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
