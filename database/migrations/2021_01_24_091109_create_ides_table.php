<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ides', function (Blueprint $table) {

            $table->id();
            $table->string('category');
            $table->string('name');
            $table->string('family');
            $table->string('numberid');
            $table->string('nationalcode');
            $table->timestamp('born_at');
            $table->string('phone');
            $table->tinyInteger('maritalstatus');
            $table->tinyInteger('gender');
            $table->string('militaryservice');
            $table->string('nationality');
            $table->string('mobile');
            $table->string('religion');
            $table->timestamps();
            //startup
            $table->string('startupname');
            $table->text('startupdesc');
            $table->text('startupproblem');
            $table->text('startupfounders');
            $table->text('startupcustomer');
            $table->text('startuprival');
            $table->text('startupsocialnetwork');
            $table->text('startupusersupport');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ides');
    }
}
