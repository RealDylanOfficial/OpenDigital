<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string("username", 128)->unique();
            $table->string("password", 60);     //Salt is store in password hash using Bcrypt
            $table->string("profile_picture")->nullable();       //relative filepath to picture
            $table->string("email")->unique();
            $table->timestamps();
            //Also note that when running migrations, a personal access token table is created as well. This is part of laravel Sanctum and I can disable it but we may wish to use it in the future
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
};
