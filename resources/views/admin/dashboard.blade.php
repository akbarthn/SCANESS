<!-- resources/views/karyawan/dashboard.blade.php -->

@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800">Selamat datang, {{ Auth::user()->nama }}!</h1>
    <p class="text-gray-600 mt-2">Ini adalah dashboard karyawan.</p>
@endsection

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="text-red-600 hover:underline">Logout</button>
</form>


