<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msts_cities', function (Blueprint $table) {
            $table->id();
            $table->string('city');            
            $table->string('state_code')->length(4);
            $table->string('country_code')->length(2);
            $table->foreign('state_code')->references('state_code')->on('msts_states');
            $table->foreign('country_code')->references('country_code')->on('msts_countries');
            $table->unsignedMediumInteger('zipcode')->length(8);
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
        Schema::dropIfExists('cities_states');
    }
}
