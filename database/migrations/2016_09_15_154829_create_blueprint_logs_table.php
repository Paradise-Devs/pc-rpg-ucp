<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlueprintLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blueprint_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blueprint_id')->unsigned();
            $table->foreign('blueprint_id')->references('id')->on('blueprints')->onDelete('cascade');
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
        Schema::drop('blueprint_logs');
    }
}
