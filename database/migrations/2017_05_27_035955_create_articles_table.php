<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('articlecategory_id');
            $table->foreign('articlecategory_id')->references('id')->on('articlecategories')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('lang' , 10)->default('fa');
            $table->text('description');
            $table->text('body');
            $table->text('images');
            $table->string('tags');
            $table->bigInteger('viewCount')->default(0);
            $table->bigInteger('commentCount')->default(0);
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
        Schema::dropIfExists('articles');
    }
}
