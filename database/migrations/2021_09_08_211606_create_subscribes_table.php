<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('subscribes_user_id_foreign');
            $table->unsignedInteger('term_id')->index('subscribes_term_id_foreign');
            $table->unsignedInteger('payment_id')->index('subscribes_payment_id_foreign');
            $table->double('total');
            $table->double('paid')->default(0);
            $table->date('next_payment_date')->nullable();
            $table->double('unpaid')->nullable();
            $table->string('paid_percentage')->nullable();
            $table->unsignedInteger('created_by')->nullable()->index('subscribes_created_by_foreign');
            $table->tinyInteger('status')->default(1);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('subscribes');
    }
}
