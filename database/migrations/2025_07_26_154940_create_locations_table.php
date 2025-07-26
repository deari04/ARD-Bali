<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('location', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);               // Judul lokasi
            $table->text('address');                    // Alamat lengkap
            $table->string('phone', 20)->nullable();    // Nomor telepon biasa
            $table->string('whatsapp', 20)->nullable(); // Nomor WhatsApp
            $table->string('email', 100)->nullable();   // Email
            $table->text('maps_embed_url')->nullable(); // Embed Google Maps
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('location');
    }
};

