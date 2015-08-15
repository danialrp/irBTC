<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reference_number')->unsigned()->unique()->nullable();
            $table->integer('owner')->unsigned()->nullable();
            $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');
            $table->integer('type')->unsigned()->nullable();
            $table->foreign('type')->references('id')->on('types')->onDelete('cascade');
            $table->decimal('amount', 15, 6)->nullable();
            $table->decimal('remain', 15, 6)->nullable();
            $table->decimal('value', 9, 0)->nullable();
            $table->decimal('fee_amount', 9, 0)->nullable();
            $table->integer('status')->unsigned()->nullable();
            $table->foreign('status')->references('id')->on('statuses')->onDelete('cascade');
            $table->integer('money')->unsigned()->nullable();
            $table->foreign('money')->references('id')->on('monies')->onDelete('cascade');
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
        Schema::drop('trades');
    }
}
