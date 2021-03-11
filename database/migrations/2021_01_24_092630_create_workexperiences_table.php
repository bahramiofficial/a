<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkexperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workexperiences', function (Blueprint $table) {
            $table->id();
            $table->string('companyname');
            $table->string('insurance'); //bime
            $table->string('timework');// modat zamaan
            $table->string('Side'); //semat
            $table->string('quitjob'); //elat tark kar
            $table->string('manageraddress');
            $table->string('managernumber');
            $table->string('lang' , 10)->default('fa');
            $table->unsignedBigInteger('recruitment_id');
            $table->foreign('recruitment_id')
                ->references('id')
                ->on('recruitments')
                ->onDelete('cascade');
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
        Schema::dropIfExists('workexperiences');
    }
}
