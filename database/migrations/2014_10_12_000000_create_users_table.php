<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email', 32)->unique();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();

        // Optionals columns
            $table->string('lastname', 32)->nullable();
            $table->string('phone', 32)->nullable();
            $table->string('province', 32)->nullable();
            $table->smallInteger('age', false, true)->nullable();
            $table->string('fiscalcode', 32)->nullable();
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
