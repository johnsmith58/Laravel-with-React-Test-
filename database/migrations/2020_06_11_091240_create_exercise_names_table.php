<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExerciseNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_names', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grade_id');
            $table->foreign('grade_id')->references('id')->on('grades');
            $table->unsignedBigInteger('class_room_id');
            $table->foreign('class_room_id')->references('id')->on('class_rooms');
            $table->string('name');
            $table->string('year');
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
        Schema::dropIfExists('exercise_names');
    }
}
