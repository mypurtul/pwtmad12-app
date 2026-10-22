<?php

namespace App\Http\Controllers;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliah = [
            [
                'kode' => 'IF101',
                'nama' => 'Pemrograman Web Tingkat Mahir',
                'sks' => 3
            ],
            [
                'kode' => 'IF102',
                'nama' => 'Pemrograman Java Web Enterprise',
                'sks' => 3
            ],
            [
                'kode' => 'IF103',
                'nama' => 'Ai For Cyber Security',
                'sks' => 3
            ],
            [
                'kode' => 'IF104',
                'nama' => 'Capstone Project',
                'sks' => 4
            ]
        ];

        return view('matakuliah.index', compact('mataKuliah'));
    }
}