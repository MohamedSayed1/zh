<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSubscribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscribes', function (Blueprint $table) {
            $table->foreign('payment_id')->references('setting_id')->on('payment_settings')->onDelete('CASCADE');
            $table->foreign('term_id')->references('term_id')->on('terms')->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscribes', function (Blueprint $table) {
            $table->dropForeign('subscribes_payment_id_foreign');
            $table->dropForeign('subscribes_term_id_foreign');
            $table->dropForeign('subscribes_user_id_foreign');
        });
    }
}
