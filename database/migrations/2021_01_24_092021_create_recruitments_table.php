<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitments', function (Blueprint $table) {
            $table->id();
            //Personal Information
            $table->string('status')->default('0');
            $table->string('category');
            $table->string('name');
            $table->string('family');
            $table->string('numberid');
            $table->string('nationality');
            $table->tinyInteger('married');
            $table->string('nationalcode');
            $table->tinyInteger('gender');
            $table->string('religion');
            $table->timestamp('born_at');
            $table->string('fathername');
            $table->string('fatherjob');
            //Contacts
            $table->string('email');
            $table->bigInteger('citycode');
            $table->string('phone');
            $table->string('province');
            $table->string('city');
            $table->string('mobile');
            $table->text('address');
            //OtherInformation
            $table->string('familiarity'); //az koja ba ma ashna shodin
            $table->string('typeCollaboration')->default(0); //noe hamkari
            $table->string('startTime');//zaman shroe kar
            $table->string('resumefilepath'); //uplod rezome
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
        Schema::dropIfExists('recruitments');
    }
}
