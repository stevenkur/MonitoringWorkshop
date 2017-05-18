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
        Schema::create('bbs', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('ID_WORKER');
            $table->string('WORKER_NAME', 25);
            $table->string('ATTENDANCE', 18);
            $table->string('PROCESS', 18);
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
        Schema::dropIfExists('bbs');
    }
}
