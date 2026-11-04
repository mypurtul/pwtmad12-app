<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index() { $mahasiswa = Mahasiswa::orderBy('nama')->paginate(10); return view('mahasiswa.index', compact('mahasiswa')); }
    public function tampil() { $mahasiswa = Mahasiswa::orderBy('nama')->get(); return view('tampilmahasiswa', compact('mahasiswa')); }
    public function detil(int $id) { $mahasiswa = Mahasiswa::findOrFail($id); return view('detilmahasiswa', compact('mahasiswa')); }
    public function data() { $mahasiswa = DB::table('mahasiswa')->select('id', 'nim', 'nama', 'prodi', 'email', 'nohp')->orderBy('nama')->get(); return view('tampilmahasiswa', compact('mahasiswa')); }
    public function create() { return view('mahasiswa.create'); }
}
