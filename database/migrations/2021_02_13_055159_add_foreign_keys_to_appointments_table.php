<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('point_id');
            $table->unsignedBigInteger('notification_id')->nullable();


           $table->foreign('user_id')->references('id')->on('users') ->onDelete('cascade');;
           $table->foreign('car_id')->references('id')->on('cars') ->onDelete('cascade');
           $table->foreign('service_id')->references('id')->on('services') ->onDelete('cascade');
           $table->foreign('point_id')->references('id')->on('points') ->onDelete('cascade');
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
        Schema::table('appointments', function (Blueprint $table) {
            //
        });
    }
}
