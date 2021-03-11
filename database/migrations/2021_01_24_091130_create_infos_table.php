<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lang' , 10)->default('fa');
            $table->string('family');
            $table->timestamp('born_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('orientation');
            $table->string('rolegroup');
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
        Schema::dropIfExists('infos');
    }
}
