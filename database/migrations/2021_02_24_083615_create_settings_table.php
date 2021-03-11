<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('educationalpack');
            $table->string('educationalarticles');
            $table->string('ebook');
            $table->string('podcast');

            $table->string('newsarticles');
            $table->string('khabarname');
            $table->string('img');
            $table->string('cooperation');

            $table->string('voicebook');
            $table->string('latest');
            $table->string('usualquestions');
            $table->string('acceptidea');

            $table->string('logo');

            $table->string('title');
            $table->string('homedesctop');
            $table->string('worksection');
            $table->string('dep');

            $table->string('article');
            $table->string('homedescdown');
            $table->string('ourresources');
            $table->string('instagram');

            $table->string('coleagesuggecstions');
            $table->string('contactus');

            $table->string('lang' , 10)->default('fa');

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
        Schema::dropIfExists('settings');
    }
}
