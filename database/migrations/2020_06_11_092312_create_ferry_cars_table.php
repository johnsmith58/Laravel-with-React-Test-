<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFerryCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ferry_cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ferry_owner_info_id');
            $table->foreign('ferry_owner_info_id')->references('id')->on('ferry_owner_infos');
            $table->string('car_no');
            $table->string('car_model');
            $table->string('car_year');
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
        Schema::dropIfExists('ferry_cars');
    }
}
