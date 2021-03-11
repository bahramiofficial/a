<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartupinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startupinfos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('desc');
            $table->text('problem');
            $table->text('founders');
            $table->text('customer');
            $table->text('rival');
            $table->text('socialnetwork');
            $table->text('usersupport');
            $table->string('lang' , 10)->default('fa');
            $table->unsignedBigInteger('ide_id');
            $table->foreign('ide_id')->on('ides')
                ->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('startupinfos');
    }
}
