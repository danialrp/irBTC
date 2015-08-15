<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner')->unsigned()->nullable();
            $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');
            $table->integer('money')->unsigned()->nullable();
            $table->foreign('money')->references('id')->on('monies')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('acc_number')->nullable();
            $table->string('card_number')->nullable();
            $table->string('shaba_number')->nullable();
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
        Schema::drop('banks');
    }
}
