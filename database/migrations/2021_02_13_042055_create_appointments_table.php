<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_from');
            $table->date('date_to');
            $table->string('notes');

            $table->unsignedInteger('user_id');
            $table->unsignedInteger('car_id');
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('point_id');
            $table->unsignedInteger('notification_id')->nullable();


            $table->foreign('user_id')->references('id')->on('users') ->onDelete('cascade');;
            $table->foreign('car_id')->references('id')->on('cars') ->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services') ->onDelete('cascade');
            $table->foreign('point_id')->references('id')->on('points') ->onDelete('cascade');
            $table->foreign('notification_id')->references('id')->on('notifications') ->onDelete('cascade');

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
        Schema::dropIfExists('appointments');
    }
}
