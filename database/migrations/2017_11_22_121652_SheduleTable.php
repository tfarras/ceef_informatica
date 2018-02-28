<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shedule', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lesson_1')->nullable();
            $table->string('lesson_2')->nullable();
            $table->string('lesson_3')->nullable();
            $table->string('lesson_4')->nullable();
            $table->string('lesson_5')->nullable();
            $table->string('lesson_6')->nullable();
            $table->string('lesson_7')->nullable();
            $table->integer('day_of_week_id');
            $table->integer('teacher_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shedule');
    }
}
