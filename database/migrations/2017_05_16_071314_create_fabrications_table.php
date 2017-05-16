<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFabricationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabrications', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('ID_WORKER');
            $table->string('WORKER_NAME', 25);
            $table->string('ATTENDANCE', 18);
            $table->string('PROCESS', 18);
            $table->string('OPERATOR', 25);
            $table->string('MACHINE', 20);
            $table->double('MACHINE_WORKING', 6,2);
            $table->double('MACHINE_ADD_HOURS', 6,2);
            $table->string('PROBLEM', 50);
            $table->double('WASTE_TIME', 6,2);
            $table->integer('SHIFT');
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
        Schema::dropIfExists('fabrications');
    }
}
