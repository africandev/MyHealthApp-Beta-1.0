<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBioMassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bio_masses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('mass');
            $table->string('mass_unit');
            $table->string('height');
            $table->string('height_unit');
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
        Schema::dropIfExists('bio_masses');
    }
}
