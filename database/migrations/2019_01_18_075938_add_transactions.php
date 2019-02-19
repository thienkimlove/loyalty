<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('member_id');
            $table->unsignedInteger('event_id')->nullable();
            $table->unsignedInteger('point')->default(0);
            $table->unsignedInteger('gold')->default(0);
            $table->enum('type', [
                'add_card',
                'by_recommend',
                'reset_gold',
                'reset_point',
                'exchange_product',
                'play_game',
                'get_gift'
            ]);
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
        Schema::dropIfExists('transactions');
    }
}
