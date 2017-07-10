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
            $table->integer('crew_id')->unsigned();
            //$table->foreign('crew_id')->references('id')->on('crews')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('type_id');
            $table->string('room', 10);
            $table->integer('amount');
            $table->date('start');
            $table->date('finish')->nullable();
            $table->boolean('completed')->default(0);
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
