<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddYearToYachts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('yachts', function (Blueprint $table) {
            $table->integer('year')->unsigned()->nullable();
            $table->string('material');
        });
        Schema::table('yachts', function (Blueprint $table) {
            $table->dropColumn('weight');
            $table->dropColumn('capacity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('yachts', function (Blueprint $table) {
            $table->dropColumn('year');
            $table->dropColumn('material');
        });
    }
}
