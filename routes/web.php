<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        $role = Auth::user()->role;

        return match ($role) {
            'superadmin' => redirect()->route('superadmin.dashboard'),
            'admin' => redirect()->route('admin.dashboard'),
            'karyawan' => redirect()->route('karyawan.dashboard'),
            default => redirect()->route('auth.login'),
        };
    }

    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/superadmin/dashboard', fn () => view('superadmin.dashboard'))->name('superadmin.dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');
});

Route::middleware(['auth', 'role:karyawan'])->group(function () {
    Route::get('/karyawan/dashboard', fn () => view('karyawan.dashboard'))->name('karyawan.dashboard');
});

require __DIR__.'/auth.php';
