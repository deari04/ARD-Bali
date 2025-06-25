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
    Schema::create('galleries', function (Blueprint $table) {
        $table->id('id_galeri');
        $table->string('foto_galeri', 255);
        $table->string('judul', 45);
        $table->unsignedBigInteger('id_admin');
        $table->unsignedBigInteger('id_pengunjung');
        $table->timestamps();

        // Foreign key opsional jika tabel admin dan pengunjung ada
        // $table->foreign('id_admin')->references('id')->on('admins')->onDelete('cascade');
        // $table->foreign('id_pengunjung')->references('id_pengunjung')->on('pengunjungs')->onDelete('cascade');
    });
}

};
