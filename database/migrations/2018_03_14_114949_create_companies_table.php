<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_companies', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->string('address', 1000);
            $table->string('city');
            $table->string('zip');
            $table->integer('countryId');
            $table->string('phone');
            $table->string('fax');
            $table->string('vatcode');
            $table->string('web');
            $table->string('email');
            $table->boolean('pac');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_companies');
    }
}
