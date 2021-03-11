<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('type', 10);//free vip
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->text('body')->nullable();
            $table->string('price',50)->default(0);
            $table->text('images')->nullable();
            $table->string('tags')->nullable();
            $table->text('metadescription')->nullable();
            $table->string('time', 15)->default('00:00:00');
            $table->bigInteger('viewCount')->default(0);
            $table->bigInteger('commentCount')->default(0);

            $table->string('lang' , 10)->default('fa');


            //book and redio and article
            $table->string('kind')->default('package'); //pakage redio  ketab maghaleh
            $table->string('summery')->nullable();
            $table->string('slugvoice')->nullable();
            $table->string('writer')->nullable();
            $table->string('speaker')->nullable();
            $table->text('review')->nullable();
            $table->text('pdf')->nullable();
            $table->text('voice')->nullable();
            $table->text('demovoice')->nullable();
            $table->text('dpdfCount')->nullable();
            $table->text('dvoiceCount')->nullable();
            $table->text('Countplaydemo')->nullable();
            $table->text('Countclickb')->nullable();
            $table->tinyInteger('score')->nullable();//dont have front in figma and dont create in controller
            $table->text('linkb')->nullable();
            $table->timestamps();

            $table->string('meta_desc')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
