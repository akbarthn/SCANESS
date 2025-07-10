@extends('layouts.superadmin')
@section('content')
<div class="container py-4">
    <h1 class="mb-4">Dashboard Super Admin</h1>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Karyawan</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalKaryawan }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Admin</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalAdmin }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Total Shift</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalShift }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Total Jadwal</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalJadwal }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection