<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('point_id');
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('notification_id');

            $table->foreign('point_id')->references('id')->on('points') ->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars') ->onDelete('cascade');
            $table->foreign('notification_id')->references('id')->on('notifications') ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
