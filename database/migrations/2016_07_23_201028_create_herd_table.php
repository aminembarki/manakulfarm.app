<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('herd', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('active');
            $table->timestamps();
        });

        $t = DB::table('herd');
        $t->insert(['name' => 'วัวแรกเกิด', 'active' => true]);
        $t->insert(['name' => 'วัวรุ่น', 'active' => true]);
        $t->insert(['name' => 'วัวสาว', 'active' => true]);
        $t->insert(['name' => 'วัวรีด', 'active' => true]);
        $t->insert(['name' => 'วัวดราย', 'active' => true]);
        $t->insert(['name' => 'ขาย', 'active' => false]);
        $t->insert(['name' => 'ตาย', 'active' => false]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('herd');
    }
}
