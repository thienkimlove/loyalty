<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveBranch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->dropColumn('branch_id');
        });
        Schema::table('add_cards', function (Blueprint $table) {
            $table->dropColumn('branch_id');
        });
        Schema::dropIfExists('branches');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->unsignedInteger('branch_id')->nullable();
        });
        Schema::table('add_cards', function (Blueprint $table) {
            $table->unsignedInteger('branch_id')->nullable();
        });

        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('address');
            $table->timestamps();
        });
    }
}
