<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('sliders', function (Blueprint $table) {
        $table->unsignedBigInteger('service_category_id')->nullable()->after('id');
        $table->foreign('service_category_id')->references('id')->on('service_categories')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('sliders', function (Blueprint $table) {
        $table->dropForeign(['service_category_id']);
        $table->dropColumn('service_category_id');
    });
}

};
