<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_number', 15)->nullable()->default(null);
            $table->string('alternate_number', 15)->nullable()->default(null);
            $table->enum('gender', ['m','f'])->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->string('zipcode')->nullable()->default(null);
            $table->string('street_address')->nullable()->default(null);
            $table->string('street_address2')->nullable()->default(null);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
