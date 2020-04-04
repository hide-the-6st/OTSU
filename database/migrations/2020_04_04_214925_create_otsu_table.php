<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtsuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otsu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user-id');
            $table->integer('post-id');

            $table->foreign('user-id')->references('id')->on('users');
            $table->foreign('post-id')->references('id')->on('users');
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
        Schema::dropIfExists('otsu');
    }
}
