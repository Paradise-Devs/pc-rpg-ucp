<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlueprintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blueprints', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('importance');
            $table->string('importance_style');
            $table->string('importance_icon', 32);
            $table->string('status');
            $table->string('status_style');
            $table->string('status_icon', 32);
            $table->integer('upvotes')->unsigned();
            $table->integer('downvotes')->unsigned();
            $table->integer('views')->unsigned();
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
        Schema::drop('blueprints');
    }
}
