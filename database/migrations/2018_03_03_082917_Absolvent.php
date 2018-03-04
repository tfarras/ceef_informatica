<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Absolvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absolvent',function (Blueprint $table){
           $table->increments('id');
           $table->string('first_name');
           $table->string('last_name');
           $table->string('year');
           $table->string('group');
           $table->string('work');
           $table->string('photo_path');
           $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absolvent');
        //
    }
}
