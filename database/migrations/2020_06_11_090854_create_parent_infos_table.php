<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->enum('father_or_mother', ['father', 'mother'])->default('father');
            $table->string('name');
            $table->integer('one_year_salary');
            $table->integer('family_total');
            $table->integer('phone_number');
            $table->string('email');
            $table->enum('still_alive', ['live', 'not_live'])->default('live');
            $table->enum('live_with_student', ['live', 'not_live'])->default('live');
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
        Schema::dropIfExists('parent_infos');
    }
}
