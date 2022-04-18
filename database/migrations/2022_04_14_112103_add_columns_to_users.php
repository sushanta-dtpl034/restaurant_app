<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number', 15)->nullable()->default(null);
            $table->string('alternate_number', 15)->nullable()->default(null);
            $table->enum('gender', ['m','f'])->nullable()->default(null);
            $table->string('state_code')->length(4)->nullable()->default(null);
            $table->string('country_code')->length(2)->nullable()->default(null);
            $table->integer('city_id', 0)->nullable()->default(null);
            $table->foreign('country_code')->references('countycode')->on('countries');
            $table->foreign('state_code')->references('statecode')->on('states');
            $table->foreign('city_id')->references('id')->on('cities');            
            $table->string('zipcode')->nullable()->default(null);
            $table->string('street_address')->nullable()->default(null);
            $table->string('street_address2')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone_number');
            $table->dropColumn('gender');
            $table->dropColumn('county_code');
            $table->dropColumn('state_code');
            $table->dropColumn('city_id');
            $table->dropColumn('zipcode');
            $table->dropColumn('address');
            $table->dropColumn('image');
        });
    }
}
