<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('service_categories', function (Blueprint $table) {
        $table->integer('order_position')->default(0)->after('is_active');
    });
}

public function down()
{
    Schema::table('service_categories', function (Blueprint $table) {
        $table->dropColumn('order_position');
    });
}

};
