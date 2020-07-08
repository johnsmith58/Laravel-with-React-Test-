<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentCardNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_card_numbers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_card_id');
            $table->foreign('student_card_id')->references('id')->on('student_cards');
            $table->string('card_no');
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
        Schema::dropIfExists('student_card_numbers');
    }
}
