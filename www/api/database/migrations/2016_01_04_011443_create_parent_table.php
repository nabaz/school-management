<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_students', function(Blueprint $table){
            $table->increments('id');
            $table->integer('student_id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('occupancy');
            $table->string('status'); //Married, Divorced
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
        Schema::drop('parent_students');
    }
}
