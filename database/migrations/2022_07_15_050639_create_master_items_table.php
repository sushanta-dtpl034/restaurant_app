<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained();
            $table->string('name')->unique();
            $table->string('image');
            $table->foreignId('master_category_id')->constrained();
            $table->foreignId('master_sub_category_id')->constrained();
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
        Schema::dropIfExists('master_items');
    }
}
