<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_quiz_answers', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->tinyInteger("isCorrect")->detault(0);
            $table->unsignedBigInteger('quiz_id');
            $table->foreign('quiz_id')->references('id')->on('course_quizs');
            $table->tinyInteger("status")->default(1);
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned();
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
        Schema::dropIfExists('course_quiz_answers');
    }
};
