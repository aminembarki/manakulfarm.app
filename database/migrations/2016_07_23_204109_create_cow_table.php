<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cow', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('serial')->nullable();
            $table->date('birthdate')->nullable();
            $table->integer('herd_id')->unsigned()->nullable();
            $table->integer('breeder_id')->unsigned()->nullable();
            $table->integer('mother_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('herd_id')->references('id')->on('herd');
            $table->foreign('breeder_id')->references('id')->on('breeder');
            $table->foreign('mother_id')->references('id')->on('cow');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cow');
    }
}
