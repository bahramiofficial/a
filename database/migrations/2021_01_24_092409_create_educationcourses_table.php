<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationcoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educationcourses', function (Blueprint $table) {
            $table->id();
            $table->string('coursetitle');
            $table->string('academy');
            $table->text('certificatepath');
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
        Schema::dropIfExists('educationcourses');
    }
}
