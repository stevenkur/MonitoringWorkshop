<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plates', function (Blueprint $table) {
            $table->string('ID', 25)->index();
            $table->integer('ID_PROJECT');
            $table->string('PROJECT_NAME', 55);
            $table->integer('ID_BLOCK');
            $table->string('BLOCK_NAME', 25);
            $table->double('LENGTH', 6, 2);
            $table->double('BREADTH', 6, 2);
            $table->double('THICKNESS', 6, 2);
            $table->double('PORT', 6, 2);
            $table->double('CENTER', 6, 2);
            $table->double('STARBOARD', 6, 2);
            $table->double('WEIGHT', 6, 2);
            $table->date('DATE_COMING')->default(null);
            $table->integer('STRAIGHTENING')->default(0);
            $table->integer('BLASTING')->default(0);
            $table->integer('MARKING')->default(0);
            $table->integer('CUTTING')->default(0);
            $table->integer('BLENDING')->default(0);
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
        Schema::dropIfExists('plates');
    }
}
