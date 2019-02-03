<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDiseaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disease_user', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('disease_id');
            $table->timestamps();
            $table->primary(['user_id', 'disease_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disease_user');
    }
}
