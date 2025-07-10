@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="max-width: 400px; margin: auto; padding: 20px; border-radius: 10px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); background-color: #f8f9fa;">
            <h1 class="text-center" style="font-size: 24px; color: #333;">Tambah Karyawan</h1>
            <form action="{{ route('karyawan.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" style="font-weight: bold;">Nama:</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group">
                    <label for="email" style="font-weight: bold;">Email:</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password" style="font-weight: bold;">Password:</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn btn-custom btn-block">Simpan</button>
            </form>
        </div>
    </div>
@endsection

<style>
    .card {
        background-color: #ffffff;
        border: none;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
    .form-control {
        margin-bottom: 15px;
        border-radius: 5px;
        border: 1px solid #ced4da;
        transition: border-color 0.3s;
    }
    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    .btn-custom {
        background-color: #007bff; /* Warna biru */
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;
        transition: background-color 0.3s, transform 0.3s;
    }
    .btn-custom:hover {
        background-color: #0056b3; /* Warna biru lebih gelap saat hover */
        transform: translateY(-2px); /* Efek angkat saat hover */
    }
    .btn-custom:active {
        transform: translateY(0); /* Kembali ke posisi semula saat diklik */
    }
</style>