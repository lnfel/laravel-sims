<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhilippineCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('philippine_cities', function (Blueprint $table) {
            $table->id();
            $table->string('psgc_code');
            $table->string('city_municipality_description');
            $table->string('region_description');
            $table->string('province_code');
            $table->string('city_municipality_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('philippine_cities');
    }
}
