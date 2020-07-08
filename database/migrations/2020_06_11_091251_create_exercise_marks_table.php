<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExerciseMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_marks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exercise_name_id');
            $table->foreign('exercise_name_id')->references('id')->on('exercise_names');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->integer('mm');
            $table->integer('eng');
            $table->integer('math');
            $table->integer('physic');
            $table->integer('chemistry');
            $table->enum('is_bio', ['bio', 'eco'])->default('bio');
            $table->integer('last_subject_mark');
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
        Schema::dropIfExists('exercise_marks');
    }
}
