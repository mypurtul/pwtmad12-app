<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliah = MataKuliah::with('dosen')->orderBy('kode')->get();
        return view('matakuliah.index', compact('mataKuliah'));
    }
}
