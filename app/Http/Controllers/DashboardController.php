<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahMahasiswa = 5;
        $jumlahDosen = 3;
        $jumlahMataKuliah = 6;

        return view('dashboard', compact(
            'jumlahMahasiswa',
            'jumlahDosen',
            'jumlahMataKuliah'
        ));
    }
}