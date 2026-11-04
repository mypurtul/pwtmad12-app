<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        if (! app()->environment(['local', 'testing'])) throw new RuntimeException('Admin seeder hanya boleh dijalankan pada local/testing.');
        $password = env('ADMIN_USER_PASSWORD');
        if (blank($password) || strlen($password) < 8) throw new RuntimeException('Atur ADMIN_USER_PASSWORD minimal 8 karakter pada .env terlebih dahulu.');
        $user = User::firstOrNew(['email' => 'admin@siakad.test']);
        $user->name = 'Administrator';
        $user->role = 'admin';
        if (! $user->exists) $user->password = Hash::make($password);
        $user->save();
    }
}
