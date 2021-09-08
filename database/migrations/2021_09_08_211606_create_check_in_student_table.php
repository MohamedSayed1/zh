<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckInStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_in_student', function (Blueprint $table) {
            $table->increments('check_id');
            $table->integer('setup_id')->nullable();
            $table->integer('daily_id')->nullable();
            $table->integer('admin_id')->nullable();
            $table->string('student_code', 300)->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('check_in_student');
    }
}
