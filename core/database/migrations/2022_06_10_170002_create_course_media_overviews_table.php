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
        Schema::create('course_media_overviews', function (Blueprint $table) {
            $table->id();
            $table->string("type")->nullable();
            $table->integer("sortindex")->detault(0)->unsigned();
            $table->unsignedBigInteger('lesson_id');
            $table->foreign('lesson_id')->references('id')->on('course_lessons');
            $table->string("resourse")->nullable();
            $table->string("resourse_name")->nullable();
            $table->string("duration")->nullable();
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
        Schema::dropIfExists('course_media_overviews');
    }
};
