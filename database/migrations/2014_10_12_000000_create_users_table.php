<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',65);
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',120);
            $table->string('img');
            $table->string('code');
            $table->string('notes');

            $table->unsignedBigInteger('point_id');
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('notification_id');

            $table->foreign('point_id')->references('id')->on('points') ->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars') ->onDelete('cascade');
            $table->foreign('notification_id')->references('id')->on('notifications') ->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
