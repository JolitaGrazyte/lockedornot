<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function(Blueprint $table){

            $table->increments('id');
            $table->string('device_nr', 45);
            $table->tinyInteger('state')->default(0);
            $table->integer('user_id');
            $table->timestamps();
        });

//        Schema::create('device_user', function(Blueprint $table){
//            $table->increments('id');
//            $table->tinyInteger('device_id')->unsigned();
//            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade')->onUpdate('cascade');
//
//            $table->tinyInteger('state')->unsigned();
//            $table->foreign('state')->references('state')->on('devices')->onDelete('cascade')->onUpdate('cascade');
//
//            $table->integer('user_id')->unsigned();
//            $table->foreign('user_id')->references('id')->on('devices')->onDelete('cascade')->onUpdate('cascade');
//
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::drop('device_user');
        Schema::drop('devices');
    }
}
