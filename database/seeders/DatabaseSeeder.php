<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin; // Tambahkan ini
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Tambah Admin
        Admin::create([
            'name' => 'Admin',
            'email' => 'ARDbali2025@gmail.com',
            'password' => Hash::make('ARDbali2025'),
        ]);

        // Tambah User Biasa
        User::create([
            'name' => 'User Biasa',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);

        // Jika kamu punya seeder lain untuk admin detail, bisa panggil
        // $this->call(AdminSeeder::class);
    }
}
