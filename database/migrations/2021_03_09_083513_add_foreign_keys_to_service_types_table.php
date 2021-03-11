<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToServiceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_types', function (Blueprint $table) {
            $table->unsignedBigInteger('price_id')->after('points')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            
            $table->foreign('price_id')->references('id')->on('prices') ->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_types', function (Blueprint $table) {
            //
        });
    }
}
