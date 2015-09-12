<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('fa_name')->nullable();
            $table->string('symbol')->nullable();
            $table->decimal('sell_rate', 15, 6)->nullable();
            $table->decimal('buy_rate', 15, 6)->nullable();
            $table->decimal('rate', 15, 6)->nullable();
            $table->string('description')->nullable();
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
        Schema::drop('monies');
    }
}
