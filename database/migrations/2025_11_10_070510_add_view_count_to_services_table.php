<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            // Cek apakah kolom status sudah ada
            if (!Schema::hasColumn('services', 'status')) {
                $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            }
            // Cek apakah kolom view_count sudah ada
            if (!Schema::hasColumn('services', 'view_count')) {
                $table->unsignedBigInteger('view_count')->default(0);
            }
        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            if (Schema::hasColumn('services', 'status')) {
                $table->dropColumn('status');
            }
            if (Schema::hasColumn('services', 'view_count')) {
                $table->dropColumn('view_count');
            }
        });
    }
};