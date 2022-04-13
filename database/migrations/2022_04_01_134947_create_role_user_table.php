<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id')->unsigned()->references('id')->on('roles');;
            $table->integer('user_id')->unsigned()->references('id')->on('users');;
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
        Schema::dropIfExists('role_user');
    }
}
