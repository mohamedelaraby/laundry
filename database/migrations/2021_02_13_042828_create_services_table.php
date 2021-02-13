<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->string('type',100);
            $table->string('notes',100);

            $table->unsignedBigInteger('point_id',100);
            $table->unsignedBigInteger('user_id',100);

            $table->foreign('user_id')->references('id')->on('users') ->onDelete('cascade');
            $table->foreign('point_id')->references('id')->on('points') ->onDelete('cascade');

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
        Schema::dropIfExists('services');
    }
}
