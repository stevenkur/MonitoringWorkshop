<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->string('ID', 25);
            $table->integer('ID_PROJECT');
            $table->string('PROJECT_NAME', 55);
            $table->integer('ID_BLOCK');
            $table->string('BLOCK_NAME', 25);
            $table->integer('ID_PANEL');
            $table->string('PANEL_NAME', 25);
            $table->string('NAME', 25);
            $table->double('LENGTH', 8, 2);
            $table->double('BREADTH', 6, 2);
            $table->double('THICKNESS', 6, 2);
            $table->double('PORT', 6, 2);
            $table->double('CENTER', 6, 2);
            $table->double('STARBOARD', 6, 2);
            $table->double('WEIGHT', 6, 2);
            $table->string('STAGE', 25);
            $table->date('DATE_COMING')->nullable();
            $table->double('FITTING', 6, 2)->default(0);
            $table->date('FITTING_DATE')->nullable();
            $table->string('FITTING_MACHINE', 50)->nullable();
            $table->double('WELDING', 6, 2)->default(0);
            $table->date('WELDING_DATE')->nullable();
            $table->string('WELDING_MACHINE', 50)->nullable();
            $table->double('GRINDING', 6, 2)->default(0);
            $table->date('GRINDING_DATE')->nullable();
            $table->string('GRINDING_MACHINE', 50)->nullable();
            $table->double('FAIRING', 6, 2)->default(0);
            $table->date('FAIRING_DATE')->nullable();
            $table->string('FAIRING_MACHINE', 50)->nullable();
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
        Schema::dropIfExists('parts');
    }
}
