<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name',25);
            $table->char('currency_code', 4)->nullable()->default(null);
            $table->smallInteger('number_code')->nullable()->default(null);
            $table->tinyInteger('status', 0)->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
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
        Schema::dropIfExists('master_currencies');
    }
}
