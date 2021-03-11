<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->string('type', 10);
            $table->string('title');
            $table->text('description');
            $table->string('videoUrl');
            $table->string('tags');
            $table->string('time', 15)->default('00:00:00');
            $table->bigInteger('number');
            $table->bigInteger('viewCount')->default(0);
            $table->bigInteger('commentCount')->default(0);
            $table->bigInteger('downloadCount')->default(0);

            $table->timestamp('datepublish')->nullable();
            $table->boolean('publish')->nullable();


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
        Schema::dropIfExists('episodes');
    }
}
