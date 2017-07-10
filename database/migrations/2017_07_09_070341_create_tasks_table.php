<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('crew_id')->references('id')->on('crews');
            $table->integer('type_id')->references('id')->on('types');
            $table->string('room', 10);
            $table->integer('amount');
            $table->date('start');
            $table->date('finish');
            $table->boolean('completed');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');

    }
}
