<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiYachtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_yachts', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->string('picturesURL', 1000);
            $table->string('mainPictureUrl', 1000);
            $table->integer('companyId');
            $table->integer('baseId');
            $table->integer('locationId');
            $table->integer('yachtModelId');
            $table->double('draft');
            $table->integer('cabins');
            $table->integer('cabinsCrew');
            $table->integer('berthsCabin');
            $table->integer('berthsSalon');
            $table->integer('berthsCrew');
            $table->integer('berthsTotal');
            $table->integer('wc');
            $table->integer('wcCrew');
            $table->integer('engines');
            $table->double('enginePower');
            $table->integer('steeringTypeId');
            $table->integer('sailTypeId');
            $table->integer('sailRenewed');
            $table->integer('genoaTypeId');
            $table->integer('genoaRenewed');
            $table->integer('commission');
            $table->integer('deposit');
            $table->integer('maxDiscount');
            $table->integer('charterType');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_yachts');
    }
}
