<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat 50 data mahasiswa dummy secara otomatis
        Mahasiswa::factory()->count(50)->create();
    }
}