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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('country');
            $table->integer('indicator');
            $table->integer('phone');
            $table->string('gender'); //m or f
            $table->decimal('height')->nullable();
            $table->string('mass_unit')->nullable();
            $table->string('height_unit')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('birthday')->nullable();
            $table->string('role');
            $table->string('disease')->nullable();
            $table->string('language');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
