<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionanswers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

            $table->string('why');
            $table->string('benefit');
            $table->string('hours');
            $table->string('lessonG');
            $table->string('lessonInfo');

            $table->text('cwhy');
            $table->text('cbenefit');
            $table->text('clessonG');
            $table->text('chours');
            $table->text('clessonInfo');

            $table->string('lang' , 10)->default('fa');

            $table->string('meta_desc')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
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
        Schema::dropIfExists('questionanswers');
    }
}
