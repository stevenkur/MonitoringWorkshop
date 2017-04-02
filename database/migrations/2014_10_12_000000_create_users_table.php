<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('USER', function (Blueprint $table) {
            $table->string('USERNAME', 25)->index();
            $table->string('PASSWORD', 35);
            $table->string('FULL_NAME', 50);
            $table->string('PHONE_NUMBER', 14);
            $table->string('DIVISION', 25);
            $table->string('POSITION', 25);
            $table->string('NIK', 20);
            $table->rememberToken();
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
        Schema::dropIfExists('USER');
    }
}
