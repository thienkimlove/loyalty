<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableGifts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('desc')->nullable();
            $table->unsignedInteger('show_price')->default(0);
            $table->unsignedInteger('gold_price')->default(0);
            $table->string('image')->nullable();
            $table->enum('award_type', ['divide', 'number', 'fake'])->default('divide');
            $table->unsignedInteger('param')->nullable();
            $table->unsignedInteger('limit_per_day')->default(100);
            $table->boolean('is_active')->default(false);
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
        Schema::dropIfExists('gifts');
    }
}
