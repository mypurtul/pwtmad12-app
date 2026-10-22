<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MataKuliahController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);

Route::resource('dosen', DosenController::class);

Route::get('/matakuliah', [MataKuliahController::class, 'index']);

Route::get('/tampilmahasiswa', [MahasiswaController::class, 'tampil']);

Route::get('/detilmahasiswa/{id}', [MahasiswaController::class, 'detil']);

Route::get('/datamahasiswa', [MahasiswaController::class, 'data']);