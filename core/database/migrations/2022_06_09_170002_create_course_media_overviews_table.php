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
            $table->enum("type",['link','file'])->nullable();
            $table->string("title")->nullable();
            $table->string("accept_format")->nullable();
            $table->tinyInteger("status")->detault(1);
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
