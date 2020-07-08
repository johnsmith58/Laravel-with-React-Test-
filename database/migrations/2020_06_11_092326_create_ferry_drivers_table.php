<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFerryDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ferry_drivers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ferry_owner_info_id');
            $table->foreign('ferry_owner_info_id')->references('id')->on('ferry_owner_infos');
            $table->unsignedBigInteger('ferry_car_id');
            $table->foreign('ferry_car_id')->references('id')->on('ferry_cars');
            $table->string('driver_name');
            $table->string('driver_phone');
            $table->string('driver_email');
            $table->string('driver_nrc');
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
        Schema::dropIfExists('ferry_drivers');
    }
}
