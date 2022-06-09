<?php

use App\Models\User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->from(6092022);
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('isAdmin')->default(0)->unsigned();
            $table->rememberToken();
            $table->string('cid')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        $data = array(
            "name" => "Tufayal Hossin Emon",
            "email" => "admin@artyir.com",
            "email_verified_at" => date('Y-m-d H:i:s'),
            "isAdmin" => 1,
            "cid" => alphaNumeric(20,'upper'),
            "password" => bcrypt("12345678"),
        );
        User::create($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
