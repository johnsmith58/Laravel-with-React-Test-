<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_info_id');
            $table->foreign('parent_info_id')->references('id')->on('parent_infos');
            $table->string('country');
            $table->string('township');
            $table->string('quarter');
            $table->string('street_name');
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
        Schema::dropIfExists('parent_addresses');
    }
}
