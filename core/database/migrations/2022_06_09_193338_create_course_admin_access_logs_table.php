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
        Schema::create('course_admin_access_logs', function (Blueprint $table) {
            $table->id();
            $table->string('module_name')->nullable();
            $table->string('process_name')->nullable();
            $table->string('action')->nullable();
            $table->unsignedBigInteger('record_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('log_message')->nullable();
            $table->string('status')->nullable();
            $table->string('user_ip')->nullable();
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
        Schema::dropIfExists('course_admin_access_logs');
    }
};
