<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
           $table->unsignedBigInteger('user_id')->nullable();
           $table->unsignedBigInteger('appointment_id')->nullable();

           $table->foreign('user_id')->references('id')->on('users') ->onDelete('cascade');
           $table->foreign('appointment_id')->references('id')->on('appointments') ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            //
        });
    }
}
