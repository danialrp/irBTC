<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner')->unsigned()->nullable();
            $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');
            $table->integer('money')->unsigned()->nullable();
            $table->foreign('money')->references('id')->on('monies')->onDelete('cascade');
            $table->decimal('current_balance', 15, 6)->nullable();
            $table->decimal('last_balance', 15, 6)->nullable();
            $table->boolean('deleted')->default(false);
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
        Schema::drop('balances');
    }
}
