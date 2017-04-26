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
            $table->double('MATERIAL', 6, 2)->default(0);
            $table->double('MATERIAL_COMING', 6, 2)->default(0);
            $table->double('PART', 6, 2)->default(0);
            $table->double('PART_COMING', 6, 2)->default(0);
            $table->double('PANEL')->default(0);
            $table->double('PANEL_DONE')->default(0);
            $table->double('LOADING', 6, 2)->default(0);
            $table->date('LOADING_DATE')->nullable();
            $table->double('ADJUSTING', 6, 2)->default(0);
            $table->date('ADJUSTING_DATE')->nullable();
            $table->double('FITTING', 6, 2)->default(0);
            $table->date('FITTING_DATE')->nullable();
            $table->double('WELDING', 6, 2)->default(0);
            $table->double('WELDING_LENGTH', 6, 2)->default(0);
            $table->double('WELDING_FINISH', 6, 2)->default(0);
            $table->date('WELDING_DATE')->nullable();
            $table->date('ERECTION_START')->nullable();
            $table->date('ERECTION_FINISH')->nullable();
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
