<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('abbreviation');
            $table->string('type'); //mass: ma, height: he
            $table->decimal('convertion');  //1 SI unit = x other unit
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('units');
    }
}
