<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type',65);
            $table->string('color',65);
            $table->string('notes');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('appointment_id');

            $table->foreign('user_id')->references('id')->on('users') ->onDelete('cascade');
            $table->foreign('appointment_id')->references('id')->on('appointments') ->onDelete('cascade');

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
        Schema::dropIfExists('cars');
    }
}
