<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('installments', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('subscribe_id')->references('id')->on('subscribes')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('installments', function (Blueprint $table) {
            $table->dropForeign('installments_created_by_foreign');
            $table->dropForeign('installments_subscribe_id_foreign');
        });
    }
}
