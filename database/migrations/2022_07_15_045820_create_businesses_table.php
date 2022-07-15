<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->string('email');
            $table->foreignId('master_business_type_id')->constrained();
            $table->foreignId('user_id')->constrained();            
            $table->string('image')->nullable()->default(null);
            $table->string('phone_number', 15)->nullable()->default(null);
            $table->string('office_number', 15)->nullable()->default(null);
            $table->string('street_address',100)->nullable()->default(null);
            $table->string('street_address2',100)->nullable()->default(null);
            $table->foreignId('country_id')->constrained();
            $table->foreignId('state_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->string('zipcode')->nullable()->default(null);            
            $table->string('gst_number',20)->nullable()->default(null);
            $table->string('pan_number',20)->nullable()->default(null);
            $table->char('currency_code', 4)->nullable()->default(null);
            $table->tinyInteger('status', 0)->nullable();//1 - Means Inactive
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->softDeletes($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('businesses');
    }
}
