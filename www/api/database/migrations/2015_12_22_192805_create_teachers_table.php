<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('gender');
            $table->date('birthday');
            $table->string('degree');
            $table->string('speciality');
            $table->string('job_title');
            $table->date('employment_date');
            $table->date('employment_start');
            $table->string('skill');
            $table->string('plla');
            $table->string('qonagh');
            $table->string('maratial_state');
            $table->string('no_of_children');
            $table->string('milak');
            $table->string('mobile');
            $table->string('mollat');
            $table->text('note');
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
        Schema::drop('teachers');
    }
}
