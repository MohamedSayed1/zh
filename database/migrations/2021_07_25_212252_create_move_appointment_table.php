<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoveAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('move_appointment', function (Blueprint $table) {
            $table->increments('move_id');
            $table->integer('appoint_id');
            $table->date('date')->nullable();
            $table->enum('type', ['wait', 'move'])->default('wait');
            $table->integer('sper_id')->nullable();
            $table->integer('deriver_id')->nullable();
            $table->integer('count_bus')->nullable();
            $table->string('numper_bus', 100)->nullable();
            $table->integer('number_pass')->nullable();
            $table->timestamp('created-at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('move_appointment');
    }
}
