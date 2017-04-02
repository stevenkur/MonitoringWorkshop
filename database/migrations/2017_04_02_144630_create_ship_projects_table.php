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
            $table->string('PROJECT_NAME', 50);
            $table->string('OWNER', 50);
            $table->string('SHIP_TYPE', 14);
            $table->double('LWL', 6, 2);
            $table->double('LPP', 6, 2);
            $table->double('BREADTH', 6, 2);
            $table->double('DEPTH', 6, 2);
            $table->double('DRAFT', 6, 2);
            $table->double('DISPLACEMENT', 6, 2);
            $table->double('DESIGNED_SPEED', 6, 2);
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
