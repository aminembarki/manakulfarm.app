<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cow_id')->unsigned();
            $table->date('date');
            $table->string('type');
            $table->string('summary')->nullable();
            $table->string('in_charge')->nullable();
            $table->double('cost')->nullable();
            $table->string('done')->nullable();
            $table->timestamps();

            $table->foreign('cow_id')->references('id')->on('cow');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('treatment');
    }
}
