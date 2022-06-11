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
        Schema::create('courses', function (Blueprint $table) {
            $table->id()->from(692022);            
            $table->string('title');
            $table->string('thumbnail')->nullable();
            $table->string('sort_description')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('categories_id');
            $table->unsignedBigInteger('subcategories_id');
            $table->unsignedBigInteger('pricetiers_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->foreign('subcategories_id')->references('id')->on('subcategories');
            $table->foreign('pricetiers_id')->references('id')->on('course_pricetiers');
            $table->text('students_learn')->nullable();
            $table->text('requirements')->nullable();
            $table->text('intended_learners')->nullable();
            $table->string('language_locale')->nullable();
            $table->text('instructional_level')->nullable();
            $table->text('tags')->nullable();
            $table->integer('old_pricetiers_id')->nullable();
            $table->text('promo_video')->nullable();
            $table->integer('media_overviews_id')->nullable();
            $table->text('welcome_message')->nullable();
            $table->text('congratulations_message')->nullable();
            $table->tinyInteger('completion_certificate')->default('1');
            $table->float('completion_certificate_price')->default(0)->unsigned();
            $table->dateTime('publish_schedule')->nullable();
            $table->string('status')->default('draft');
            $table->text('message_for_approver')->nullable();
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
        Schema::dropIfExists('courses');
    }
};
