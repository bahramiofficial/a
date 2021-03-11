<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

  	    $table->id();
            $table->text('images')->nullable();
            $table->boolean('active')->default(false);
            $table->boolean('emailactive')->default(false);
	        $table->timestamp('email_verified_at')->nullable();//todo delete or merge emailactive
            $table->boolean('mobileactive')->default(false);
            $table->string('level')->default('user');
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('mobile')->unique()->nullable();
            $table->string('password')->nullable();
            $table->timestamp('viptime')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('expire_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('code')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
