<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->bigInteger('cityCode');
            $table->string('phone');
            $table->string('province');
            $table->string('city');
            $table->string('mobile');
            $table->text('address');
            $table->unsignedBigInteger('recruitment_id');
            $table->foreign('recruitment_id')->references('id')->on('recruitments')
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
        Schema::dropIfExists('contacts');
    }
}
