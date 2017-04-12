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
            $table->increments('ID');
            $table->integer('ID_PROJECT');
            $table->integer('ID_BLOCK');
            $table->integer('ID_PANEL');
            $table->string('NAME', 25);
            $table->double('LENGTH', 6, 2);
            $table->double('BREADTH', 6, 2);
            $table->double('THICKNESS', 6, 2);
            $table->double('PORT', 6, 2);
            $table->double('CENTER', 6, 2);
            $table->double('STARBOARD', 6, 2);
            $table->double('WEIGHT', 6, 2);
            $table->string('STAGE', 25);
            $table->date('DATE_COMING');
            $table->double('SA_FITTING', 6, 2);
            $table->double('SA_WELDING', 6, 2);
            $table->double('SA_GRINDING', 6, 2);
            $table->double('SA_FAIRING', 6, 2);
            $table->double('A_FITTING', 6, 2);
            $table->double('A_WELDING', 6, 2);
            $table->double('A_GRINDING', 6, 2);
            $table->double('A_FAIRING', 6, 2);
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
