<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_id')->nullable();
            $table->string('name')->nullable();
            $table->String('email')->unique();
            $table->String('password')->nullable();
            $table->string('rank')->nullable();
            $table->string('avatar')->default('default/user.png')->nullable();
            $table->string('status')->default(1);
            $table->Integer('points')->default(0);
            $table->text('fcm_token')->nullable();
            $table->string('verification_code')->nullable();
            $table->integer('is_verified')->default(0);
            $table->text('remember_token')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
