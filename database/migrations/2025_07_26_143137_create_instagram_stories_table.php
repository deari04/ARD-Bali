<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        public function up()
    {
        Schema::create('instagram_stories', function (Blueprint $table) {
            $table->id();
            $table->string('story_url'); // contoh: https://instagram.com/stories/highlights/xxx
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

};
