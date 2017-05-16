<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBBSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_b_s', function (Blueprint $table) {
            $table->string('ROOM', 25)->index();
            $table->string('SIDE', 25);
            $table->string('FRAME', 25);
            $table->string('DECK', 25);
            $table->integer('AREA');
            $table->integer('TOTAL_LAYER');
            $table->string('PAINT_TYPE', 25);
            $table->integer('PAINT_NEEDS');
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
        Schema::dropIfExists('b_b_s');
    }
}
