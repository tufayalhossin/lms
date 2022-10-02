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
        Schema::create('course_pricetiers', function (Blueprint $table) {
            $table->id();
            $table->string('currency_code');
            $table->integer('matrix_amount')->unsigned();
            $table->integer('point_amount')->unsigned();
            $table->integer('tier_amount')->unsigned();
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
        Schema::dropIfExists('course_pricetiers');
    }
};
