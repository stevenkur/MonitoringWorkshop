<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateErectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('erections', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('ID_BLOCK', 25);
            $table->integer('ID_WORKER');
            $table->string('WORKER_NAME', 25);
            $table->string('ATTENDANCE', 18);
            $table->double('WORKING_HOURS', 6,2);
            $table->double('ADD_WORKING_HOURS', 6,2);
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
        Schema::dropIfExists('erections');
    }
}
