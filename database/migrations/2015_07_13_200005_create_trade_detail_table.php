<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradeDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trade1')->unsigned()->nullable();
            $table->foreign('trade1')->references('id')->on('trades')->onDelete('cascade');
            $table->integer('trade2')->unsigned()->nullable();
            $table->foreign('trade2')->references('id')->on('trades')->onDelete('cascade');
            $table->tinyInteger('trade1_type')->unsigned()->nullable();
            $table->tinyInteger('trade2_type')->unsigned()->nullable();
            $table->decimal('amount', 15, 6)->nullable();
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
        Schema::drop('trade_details');
    }
}
