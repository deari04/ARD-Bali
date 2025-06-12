<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin; // ✅ Impor model Admin

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([ // ✅ Pakai model dengan huruf besar
            'name' => 'Admin',
            'email' => 'ARDbali2025@gmail.com',
            'password' => Hash::make('ARDbali2025'), // ✅ Password terenkripsi
        ]);
    }
}
