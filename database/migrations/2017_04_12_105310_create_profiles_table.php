<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->string('ID', 25)->index();
            $table->integer('ID_PROJECT');
            $table->integer('ID_BLOCK');
            $table->double('LENGTH', 6, 2);
            $table->double('BREADTH', 6, 2);
            $table->double('THICKNESS', 6, 2);
            $table->double('PORT', 6, 2);
            $table->double('CENTER', 6, 2);
            $table->double('STARBOARD', 6, 2);
            $table->double('WEIGHT', 6, 2);
            $table->string('FORM', 25);
            $table->date('DATE_COMING');
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
        Schema::dropIfExists('profiles');
    }
}
