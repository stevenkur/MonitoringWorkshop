<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('ID_PROJECT');
            $table->string('PROJECT_NAME', 55);
            $table->integer('ID_BLOCK');
            $table->string('BLOCK_NAME', 25);
            $table->string('ROOM', 25);
            $table->string('SIDE', 25);
            $table->string('FRAME', 25);
            $table->string('DECK', 25);
            $table->integer('AREA');
            $table->integer('TOTAL_LAYER');
            $table->string('PAINT_TYPE', 25);
            $table->double('PAINT_NEEDS', 8, 2);
            $table->double('BLASTING', 6, 2)->default(0);
            $table->date('BLASTING_DATE')->nullable();
            $table->double('PAINTING', 6, 2)->default(0);
            $table->date('PAINTING_DATE')->nullable();
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
        Schema::dropIfExists('rooms');
    }
}
