<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFerryOwnerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ferry_owner_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ferry_owner_info_id');
            $table->foreign('ferry_owner_info_id')->references('id')->on('ferry_owner_infos');
            $table->string('country');
            $table->string('township');
            $table->string('quarter');
            $table->string('street');
            $table->string('house_no');
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
        Schema::dropIfExists('ferry_owner_addresses');
    }
}
