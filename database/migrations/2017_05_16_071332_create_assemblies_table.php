<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssembliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assembly', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('ID_PANEL', 25);
            $table->double('PROGRESS', 6, 2);
            $table->integer('ID_WORKER');
            $table->string('WORKER_NAME', 25);
            $table->string('ATTENDANCE', 18);
            $table->string('PROCESS', 25);
            $table->string('OPERATOR', 25);
            $table->string('MACHINE', 20);
            $table->double('MACHINE_WORKING', 6,2);
            $table->double('MACHINE_ADD_HOURS', 6,2);
            $table->double('WORKING_HOURS', 6,2);
            $table->string('PROBLEM', 50);
            $table->double('WASTE_TIME', 6,2);
            $table->integer('SHIFT');
            $table->string('USER', 25);
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
        Schema::dropIfExists('assembly');
    }
}
