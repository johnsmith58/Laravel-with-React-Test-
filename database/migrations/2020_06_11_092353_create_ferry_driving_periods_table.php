<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFerryDrivingPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ferry_driving_periods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ferry_driver_id');
            $table->foreign('ferry_driver_id')->references('id')->on('ferry_drivers');
            $table->unsignedBigInteger('ferry_way_id');
            $table->foreign('ferry_way_id')->references('id')->on('ferry_ways');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('drived_count');
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
        Schema::dropIfExists('ferry_driving_periods');
    }
}
