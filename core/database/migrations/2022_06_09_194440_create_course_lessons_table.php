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
        Schema::create('course_lessons', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->unsignedBigInteger('section_id');
            $table->integer("sortindex")->detault(0)->unsigned();
            $table->foreign('section_id')->references('id')->on('course_sections');
            $table->integer("media_overview_id")->nullable();
            $table->string("resourse")->nullable();
            $table->string("extra_resourse")->nullable();
            $table->mediumText("lecture_description")->nullable();
            $table->tinyInteger("status")->detault(1);
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
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
        Schema::dropIfExists('course_lessons');
    }
};
