<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVideos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('slug')->unique();
            $table->string('seo_name')->nullable();
            $table->text('seo_desc')->nullable();
            $table->text('code')->nullable();
            $table->string('url')->nullable();

            $table->unsignedInteger('views')->default(0);
            $table->string('author')->nullable();

            $table->unsignedInteger('user_id')->nullable();
            $table->boolean('status')->default(true);
            $table->string('image')->nullable();
            $table->boolean('is_top')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
