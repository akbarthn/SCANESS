@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Daftar Shift Kerja</h1>
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
                        <td>{{ $s->nama }}</td>
                        <td>{{ $s->jam_masuk }}</td>
                        <td>{{ $s->jam_keluar }}</td>
                        <td>
                            <a href="{{ route('shift.edit', $s) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('shift.destroy', $s) }}" method="POST" style="display:inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus shift ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

<style>
    .table {
        background-color:rgb(255, 1, 1);
        border-radius: 8px;
        overflow: hidden;
    }
    .thead-dark th {
        background-color: #343a40;
        color: white;
    }
    .btn {
        margin-right: 5px; /* Jarak antar tombol */
    }
</style>