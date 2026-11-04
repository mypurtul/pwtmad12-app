<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Development fixtures must never create predictable accounts in production.
        if (app()->environment(['local', 'testing'])) {
            User::factory()->create(['name' => 'Test User', 'email' => 'test@example.com']);

            if (filled(env('ADMIN_USER_PASSWORD'))) {
                $this->call(AdminUserSeeder::class);
            }
        }
    }
}
