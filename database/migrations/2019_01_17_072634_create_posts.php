<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('desc')->nullable();
            $table->string('seo_name')->nullable();
            $table->text('seo_desc')->nullable();
            $table->longText('content')->nullable();
            $table->unsignedInteger('category_id');

            $table->unsignedInteger('views')->default(0);
            $table->string('author')->nullable();

            $table->unsignedInteger('user_id')->nullable();
            $table->boolean('status')->default(true);
            $table->string('image')->nullable();

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
        Schema::dropIfExists('posts');
    }
}
