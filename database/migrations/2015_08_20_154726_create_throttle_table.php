<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThrottleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('throttles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->nullable();
            $table->integer('attempt')->unsigned()->default(0);
            $table->integer('max_attempt')->unsigned()->nullable();
            $table->dateTime('attempt_time')->nullable();
            $table->dateTime('locked_time')->nullable();
            $table->boolean('locked')->default(false);
            $table->string('note')->nullable();
            $table->string('description')->nullabel();
            $table->boolean('delete')->default(false);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE throttles ADD ip VARBINARY(16)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE throttles DROP COLUMN ip');
        Schema::drop('throttles');
    }
}
