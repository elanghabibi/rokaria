<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'username' => 'skylangg7',
            'name' => 'Elang Alamsyah Habibi',
            'email' => 'elang@rokaria.com',
            'password' => bcrypt('elanghabibi17'),
            'role' => 'user'
        ]);

        User::create([
            'username' => 'admin',
            'name' => 'Admin Rokaria',
            'email' => 'admin@rokaria.com',
            'password' => bcrypt('elanghabibi17'),
            'role' => 'admin'
        ]);
    }
}
