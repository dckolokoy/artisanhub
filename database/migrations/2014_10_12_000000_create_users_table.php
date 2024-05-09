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
            $table->id();
            $table->string('name')->nullable();;
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->integer('role')->nullable();
            $table->tinyInteger('is_active')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->string('image')->nullable();
            $table->string('picture')->nullable();
            $table->timestamps();
            $table->tinyInteger('is_verified')->nullable();
            $table->text('remarks')->nullable();
            $table->text('address')->nullable();
            $table->string('mobile')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->integer('age')->nullable();
            $table->date('birthdate')->nullable();


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
