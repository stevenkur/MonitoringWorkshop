<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('ID_PROJECT');
            $table->string('PROJECT_NAME', 55);
            $table->string('NAME', 25);
            $table->integer('MATERIAL')->default(0);
            $table->integer('MATERIAL_COMING')->default(0);
            $table->integer('PART')->default(0);
            $table->integer('PART_COMING')->default(0);
            $table->double('PANEL')->default(0);
            $table->double('PANEL_DONE')->default(0);
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
        Schema::dropIfExists('blocks');
    }
}