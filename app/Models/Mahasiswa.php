<?php

namespace App\Models;

// TAMBAHKAN BARIS INI (Wajib di bagian atas sebelum class):
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // Panggil trait di dalam class:
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'nim',
        'nama',
        'prodi',
        'email',
        'nohp',
    ];
}