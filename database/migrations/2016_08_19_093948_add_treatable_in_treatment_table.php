<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTreatableInTreatmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('treatment', function ($table) {
            $table->integer('treatable_id')->nullable()->unsigned()->after('done');
            $table->string('treatable_type')->nullable()->after('treatable_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('treatment', function ($table) {
            $table->dropColumn('treatable_id');
            $table->dropColumn('treatable_type');
        });
    }
}
