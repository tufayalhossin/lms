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
        Schema::create('traffics', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('toolkit')->nullable();
            $table->string('service_type')->nullable();
            $table->string('ip')->nullable();
            $table->string('os')->nullable();
            $table->string('browser')->nullable();
            $table->string('browser_version')->nullable();
            $table->string('country')->nullable();
            $table->string('country_code')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('zip')->nullable();
            $table->text('location_info')->nullable();
            $table->text('visited_url')->nullable();
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
        Schema::dropIfExists('traffics');
    }
};
