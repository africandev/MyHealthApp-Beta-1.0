<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('headline');
            $table->mediumText('body');
            $table->integer('disease_id')->nullable();
            $table->integer('biomass')->nullable();
            $table->integer('type_id')->nullable();
            $table->integer('preparation_time');
            $table->integer('cooking_time');
            $table->string('level');
            $table->string('cover_image');
            $table->string('small_image');
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
        Schema::dropIfExists('recipes');
    }
}
