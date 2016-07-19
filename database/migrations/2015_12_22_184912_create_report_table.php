<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id'); // jmaray tommar
            $table->integer('student_id'); // jmaray znjira
            $table->date('class_year');
            $table->string('stage');
            $table->string('group'); //ch liqeka
            $table->string('class_id');
            $table->integer('sem1_eval_1')->nullable();
            $table->integer('sem1_eval_2')->nullable();
            $table->integer('sem1_eval_3')->nullable();
            $table->integer('sem1_eval_4')->nullable();
            $table->integer('sem2_eval_1')->nullable();
            $table->integer('sem2_eval_2')->nullable();
            $table->integer('sem2_eval_3')->nullable();
            $table->integer('sem2_eval_4')->nullable();
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
        Schema::drop('reports');
    }
}
