<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalizations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->json('options');
            $table->string('image')->nullable()->default(null);
            $table->timestamp('created_date', 0)->nullable();
            $table->timestamp('modify_date', 0)->nullable();
            $table->integer('created_by', 0)->nullable();
            $table->integer('modify_by', 0)->nullable();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->tinyInteger('is_delete')->default(0);
            $table->fullText('help_text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personalizations');
    }
}
