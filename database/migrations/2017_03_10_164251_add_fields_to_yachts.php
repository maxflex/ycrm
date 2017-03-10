<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToYachts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('yachts', function (Blueprint $table) {
            $table->integer('cabin_count')->unsigned()->nullable();
            $table->integer('room_count')->unsigned()->nullable();
            $table->integer('engine_count')->unsigned()->nullable();
            $table->integer('length')->unsigned()->nullable();
            $table->integer('horse_power')->unsigned()->nullable();
            $table->integer('rent_price')->unsigned()->nullable();
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
            //
        });
    }
}
