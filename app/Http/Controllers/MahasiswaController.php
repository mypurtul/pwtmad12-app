<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa; // 1. Import Model Mahasiswa
use Illuminate\Support\Facades\DB; // 2. Import Query Builder (DB)
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // ----------------------------------------------------
    // PERTEMUAN 4: Mengambil data dari Database via Eloquent
    // ----------------------------------------------------

    // Menampilkan semua data mahasiswa dari database
    public function index()
    {
        // Mengambil semua records dari tabel 'mahasiswa'
        $mahasiswa = Mahasiswa::all(); 

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    // Menampilkan data untuk fungsi tampil
    public function tampil()
    {
        $mahasiswa = Mahasiswa::all();

        return view('tampilmahasiswa', compact('mahasiswa'));
    }

    // Menampilkan detail mahasiswa berdasarkan ID
    public function detil($id)
    {
        // Mencari record mahasiswa berdasarkan Primary Key (id)
        $mahasiswa = Mahasiswa::find($id); 

        return view('detilmahasiswa', compact('mahasiswa'));
    }

    // Menampilkan data menggunakan Query Builder (DB::table)
    public function data()
    {
        $mahasiswa = DB::table('mahasiswa')
            ->select('id', 'nim', 'nama', 'prodi', 'email', 'nohp')
            ->orderBy('nama', 'asc')
            ->get();

        return view('tampilmahasiswa', compact('mahasiswa'));
    }

    // Menampilkan form tambah mahasiswa
    public function create()
    {
        return view('mahasiswa.create');
    }
}