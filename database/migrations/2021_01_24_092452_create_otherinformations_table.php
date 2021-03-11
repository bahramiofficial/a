<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherinformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otherinformations', function (Blueprint $table) {
            $table->id();
            $table->string('familiarity'); //az koja ba ma ashna shodin
            $table->string('typeCollaboration')->default(0); //noe hamkari
            $table->string('startTime');//zaman shroe kar
            $table->string('resumefilepath'); //uplod rezome
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
        Schema::dropIfExists('otherinformations');
    }
}
