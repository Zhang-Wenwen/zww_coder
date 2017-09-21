<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
<<<<<<< HEAD
            $table->timestamps();
            $table->string('name',255);
            $table->string('email',255)->unique();
            $table->string('password')->encrypt();
            $table->string('remember_token',100)->unique()->nullable();
=======
            $table->string('name',255);
            $table->string('email',255)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
>>>>>>> 2d2fad43010180e280f185450e856f31aaf010f2
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
