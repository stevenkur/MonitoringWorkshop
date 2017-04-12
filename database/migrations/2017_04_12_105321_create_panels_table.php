<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panels', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('ID_PROJECT');
            $table->integer('ID_BLOCK');
            $table->string('NAME', 25);
            $table->integer('MATERIAL');
            $table->integer('MATERIAL_COMING');
            $table->integer('PART');
            $table->integer('PART_COMING');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('panels');
    }
}
