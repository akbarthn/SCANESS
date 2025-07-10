@extends('layouts.superadmin')
@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Shift Kerja</h1>
    <a href="{{ route('shift.create') }}" class="btn btn-primary mb-3">Tambah Shift</a>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Shift</th>
                    <th>Dari</th>
                    <th>Sampai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shifts as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->nama_shift }}</td>
                    <td>{{ $s->jam_masuk }}</td>
                    <td>{{ $s->jam_keluar }}</td>
                    <td>
                        <a href="{{ route('shift.edit', $s) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('shift.destroy', $s) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus shift ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection