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
        Schema::create('course_promotions', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug")->nullable();
            $table->string("photo")->nullable();
            $table->string("coupon_type");
            $table->string("coupon_code");
            $table->longText("description")->nullable();
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->dateTime("start_date")->nullable();
            $table->dateTime("end_date")->nullable();
            $table->float("discount_value")->default(0);
            $table->enum("discount_type",['percentage','flat'])->default('flat');
            $table->tinyInteger("status")->default(1);
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_promotions');
    }
};
