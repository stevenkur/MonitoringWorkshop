<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_projects', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('PROJECT_NAME', 150);
            $table->string('OWNER', 150);
            $table->string('SHIP_TYPE', 50);
            $table->double('LWL', 6, 2);
            $table->double('LPP', 6, 2);
            $table->double('BREADTH', 6, 2);
            $table->double('DEPTH', 6, 2);
            $table->double('DRAFT', 6, 2);
            $table->double('DISPLACEMENT', 6, 2);
            $table->double('DESIGNED_SPEED', 6, 2);
            $table->double('MATERIAL', 6, 2)->default(0);
            $table->double('MATERIAL_COMING', 6, 2)->default(0);
            $table->double('PART', 6, 2)->default(0);
            $table->double('PART_COMING', 6, 2)->default(0);
            $table->double('PANEL')->default(0);
            $table->double('PANEL_DONE')->default(0);
            $table->double('BLOCK')->default(0);
            $table->double('BLOCK_DONE')->default(0);
            $table->date('START');
            $table->date('FINISH');
            $table->date('FINISHED')->nullable();
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
        Schema::dropIfExists('ship_projects');
    }
}
