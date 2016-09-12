<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('username', 25)->unique();
            $table->string('email');
            $table->string('password');
            $table->date('birthdate');
            $table->integer('admin')->default(0);
            $table->string('bio', 200)->default('Não definido.');
            $table->string('avatar_url', 150)->default('default.png');
            $table->string('facebook_url', 150)->nullable();
            $table->string('twitter_url', 150)->nullable();
            $table->string('github_url', 150)->nullable();
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
        Schema::drop('users');
    }
}
