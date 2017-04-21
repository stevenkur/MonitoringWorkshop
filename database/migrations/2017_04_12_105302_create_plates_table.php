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
            $table->double('LENGTH', 8, 2);
            $table->double('BREADTH', 6, 2);
            $table->double('THICKNESS', 6, 2);
            $table->double('PORT', 6, 2);
            $table->double('CENTER', 6, 2);
            $table->double('STARBOARD', 6, 2);
            $table->double('WEIGHT', 6, 2);
            $table->date('DATE_COMING')->nullable();
            $table->integer('STRAIGHTENING')->default(0);
            $table->date('STRAIGHTENING_DATE')->nullable();
            $table->integer('BLASTING')->default(0);
            $table->date('BLASTING_DATE')->nullable();
            $table->integer('MARKING')->default(0);
            $table->date('MARKING_DATE')->nullable();
            $table->string('MARKING_MACHINE')->nullable();
            $table->integer('CUTTING')->default(0);
            $table->date('CUTTING_DATE')->nullable();
            $table->string('CUTTING_MACHINE')->nullable();
            $table->integer('BLENDING')->default(0);
            $table->date('BLENDING_DATE')->nullable();
            $table->string('BLENDING_MACHINE')->nullable();
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
