<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreedingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breeding', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cow_id')->unsigned();
            $table->integer('breeder_id')->unsigned();
            $table->date('service_date');
            $table->string('in_charge')->nullable();
            $table->string('status');
            $table->date('calving_date')->nullable();
            $table->date('dry_date')->nullable();
            $table->timestamps();

            $table->foreign('cow_id')->references('id')->on('cow');
            $table->foreign('breeder_id')->references('id')->on('breeder');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('breeding');
    }
}
