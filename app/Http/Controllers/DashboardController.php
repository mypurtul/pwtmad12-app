<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', ['jumlahMahasiswa' => Mahasiswa::count(), 'jumlahDosen' => Dosen::count(), 'jumlahMataKuliah' => MataKuliah::count()]);
    }
}
