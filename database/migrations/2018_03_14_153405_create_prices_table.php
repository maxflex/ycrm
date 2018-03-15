<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('currency');
            $table->string('type');
            $table->date('dateFrom');
            $table->date('dateTo');
            $table->double('price');
            $table->integer('yacht_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_prices');
    }
}
