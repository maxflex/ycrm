<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewYachtsTablee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yachts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price')->nullable();
            $table->string('location');
            $table->integer('guests_capacity')->nullable();
            $table->integer('staff_capacity')->nullable();
            $table->boolean('skipper_required')->default(false);

            $table->integer('length')->nullable();
            $table->integer('width')->nullable();
            $table->integer('draught')->nullable();
            $table->integer('water_capacity')->nullable();
            $table->integer('gas_capacity')->nullable();

            $table->integer('type')->nullable();
            $table->integer('body')->nullable();
            $table->integer('year')->nullable();
            $table->integer('beds')->nullable();
            $table->integer('cabins')->nullable();
            $table->integer('staff_cabins')->nullable();
            $table->integer('toilets')->nullable();

            $table->string('engine');
            $table->integer('power')->nullable();
            $table->integer('motors')->nullable();
            $table->integer('max_speed')->nullable();
            $table->integer('cruising_speed')->nullable();
            $table->integer('fuel_consumption')->nullable();

            $table->integer('grot')->nullable();
            $table->integer('genuya')->nullable();
            $table->integer('spinaker')->nullable();
            $table->integer('genaker')->nullable();
            $table->integer('grot_trap')->nullable();

            $table->text('description');

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
        Schema::dropIfExists('yachts');
    }
}
