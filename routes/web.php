<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (): void {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.store');
});
Route::middleware('auth')->group(function (): void {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', fn () => redirect()->route('dashboard'));
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Daftar mahasiswa memuat data pribadi; batasi ke staf akademik.
    Route::middleware('role:admin,dosen')->group(function (): void {
        Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
        Route::get('/tampilmahasiswa', [MahasiswaController::class, 'tampil'])->name('mahasiswa.tampil');
        Route::get('/detilmahasiswa/{id}', [MahasiswaController::class, 'detil'])->name('mahasiswa.detil');
        Route::get('/datamahasiswa', [MahasiswaController::class, 'data'])->name('mahasiswa.data');
    });

    Route::middleware('role:admin,dosen,mahasiswa')->group(function (): void {
        Route::get('/matakuliah', [MataKuliahController::class, 'index'])->name('matakuliah.index');
    });

    Route::middleware('role:admin')->group(function (): void {
        Route::resource('dosen', DosenController::class)->except(['show']);
        Route::resource('users', UserController::class)->except(['show']);
        Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    });
});
