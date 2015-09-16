<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockchainRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blockchain_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('previous', 15, 6)->nullable();
            $table->decimal('last', 15, 6)->nullable();
            $table->decimal('buy', 15, 6)->nullable();
            $table->decimal('sell', 15, 6)->nullable();
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
        Schema::drop('blockchain_rates');
    }
}
