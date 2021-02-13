<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participators', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->string('img');
            $table->unsignedInteger('service_points');
            $table->string('service_img');
            $table->date('service_date');
            $table->string('notes');
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
        Schema::dropIfExists('participators');
    }
}
