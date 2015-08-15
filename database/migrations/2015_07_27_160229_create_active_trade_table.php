<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActiveTradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_trades', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('trade_id')->unsigned()->nullable();
            $table->tinyInteger('type')->unsigned()->nullable();
            $table->tinyInteger('owner')->unsigned()->nullable();
            $table->tinyInteger('money')->unsigned()->nullable();
            $table->decimal('remain', 15, 6)->nullable();
            $table->decimal('value', 9, 0)->nullable();
            $table->string('description')->nullable();
            $table->boolean('deleted')->default(false);
            $table->dateTime('created_fa');
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
        Schema::drop('active_trades');
    }
}
