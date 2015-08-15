<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *php
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('nname')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('tel')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('national_number')->unique()->nullable();
            $table->integer('role')->unsigned()->default(2);
            $table->foreign('role')->references('id')->on('roles')->onDelete('cascade');
            $table->boolean('active')->default(true);
            $table->boolean('confirmed')->default(false);
            $table->rememberToken();
            $table->dateTime('login_time');
            $table->string('ip_address')->nullable();
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
        Schema::drop('users');
    }
}
