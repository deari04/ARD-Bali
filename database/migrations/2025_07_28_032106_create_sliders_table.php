<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('image_path')->nullable()->comment('Path gambar slider atau URL eksternal');
            $table->string('headline_text')->comment('Teks utama yang ditampilkan di slider');
            $table->text('subheadline_text')->nullable()->comment('Teks tambahan di bawah headline');
            $table->boolean('is_active')->default(true)->comment('Status aktif/nonaktif slider');
            $table->integer('order_position')->default(0)->comment('Urutan tampilan slider');
            $table->timestamps();
            
            // Index untuk performa query
            $table->index(['is_active', 'order_position']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};