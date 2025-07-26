<?php

// database/migrations/xxxx_xx_xx_create_youtube_links_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYoutubeLinksTable extends Migration
{
    public function up()
    {
        Schema::create('youtube_links', function (Blueprint $table) {
            $table->id(); // id: int
            $table->string('title'); // title: string
            $table->string('youtube_url'); // youtube_url: string
            $table->text('description')->nullable(); // description: text
            $table->boolean('is_active')->default(true); // is_active: boolean
            $table->integer('order_position')->default(0); // order_position: int
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('youtube_links');
    }
}
