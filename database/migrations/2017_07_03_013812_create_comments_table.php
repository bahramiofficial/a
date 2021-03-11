<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('parent_id')->unsigned()->default(0);
            $table->boolean('approved')->default(0);
            $table->bigInteger('course_id')->unsigned();
            $table->text('comment');
//            $table->bigInteger('commentable_id')->unsigned();
//            $table->string('commentable_type');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id');
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
        Schema::dropIfExists('comments');
    }
}
