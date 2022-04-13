<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndustryTypeMstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msts_industry_type', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamp('created_date', 0)->nullable();
            $table->timestamp('modify_date', 0)->nullable();
            $table->integer('created_by', 0)->nullable();
            $table->integer('modify_by', 0)->nullable();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->tinyInteger('is_delete')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('industry_type_msts');
    }
}
