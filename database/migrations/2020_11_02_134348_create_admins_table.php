<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('name');
            $table->String('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->String('password');
            $table->integer('isAdmin')->default(0);
            $table->string('privilege')->nullable();
            $table->integer('status')->default(1);
            $table->string('avatar')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

//        DB::statement('ALTER TABLE admins AUTO_INCREMENT = 200000001;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
