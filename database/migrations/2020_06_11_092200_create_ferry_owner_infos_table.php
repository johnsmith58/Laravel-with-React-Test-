<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFerryOwnerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ferry_owner_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ferry_id');
            $table->foreign('ferry_id')->references('id')->on('ferries');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('nrc_no');
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
        Schema::dropIfExists('ferry_owner_infos');
    }
}
