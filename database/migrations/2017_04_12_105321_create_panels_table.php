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
            $table->string('PROJECT_NAME', 55);
            $table->integer('ID_BLOCK');
            $table->string('BLOCK_NAME', 25);
            $table->string('NAME', 25);
            $table->double('PART', 6, 2)->default(0);
            $table->double('PART_COMING', 6, 2)->default(0);
            $table->double('PART_DONE', 6, 2)->default(0);
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
        Schema::dropIfExists('panels');
    }
}
