<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstsStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msts_states', function (Blueprint $table) {
            $table->id();
            $table->string('state');
            $table->string('state_code')->length(4);
            $table->string('country_code')->length(2);
            $table->foreign('country_code')->references('country_code')->on('msts_countries');
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
        Schema::dropIfExists('msts_states');
    }
}
