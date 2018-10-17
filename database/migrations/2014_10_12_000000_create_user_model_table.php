<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserModelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname',20);
            $table->string('address',300);
            $table->string('phone',20)->nullable();
            $table->integer('gender')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('nationality',20)->nullable();
            $table->string('email',100)->unique();
            $table->string('pw',100);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

