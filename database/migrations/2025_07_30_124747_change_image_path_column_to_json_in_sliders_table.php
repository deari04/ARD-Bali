<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1️⃣ Set kolom lama menjadi NULL agar tidak error saat konversi
        DB::table('sliders')->update(['image_path' => null]);

        // 2️⃣ Ubah tipe kolom menjadi JSON
        Schema::table('sliders', function (Blueprint $table) {
            $table->json('image_path')->nullable()->comment('Menyimpan banyak path gambar slider atau URL')->change();
        });
    }

    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->string('image_path')->nullable()->comment('Path gambar slider atau URL eksternal')->change();
        });
    }
};
