<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBugLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bug_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bug_id')->unsigned();
            $table->foreign('bug_id')->references('id')->on('bugs')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('type');
            $table->string('status');
            $table->string('icon', 64);
            $table->string('style', 64);
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
        Schema::drop('bug_logs');
    }
}
