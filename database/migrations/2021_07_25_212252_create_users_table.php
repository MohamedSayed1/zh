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
            $table->increments('id');
            $table->string('name', 400)->nullable();
            $table->string('code', 400)->nullable();
            $table->string('password', 400)->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('station_id')->nullable();
            $table->string('faculty', 400)->nullable();
            $table->string('educational_level', 300)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('parent_phone', 20)->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->text('notes')->nullable();
            $table->string('remember_token', 300)->nullable();
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
        Schema::dropIfExists('users');
    }
}
