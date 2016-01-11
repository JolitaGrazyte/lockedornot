<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function(Blueprint $table){

            $table->increments('id');
            $table->integer('user_id');
            $table->string('device_nr', 45);
            $table->tinyInteger('device_state')->default(0);
            $table->timestamps();
        });



//        Schema::create('device_stats', function(Blueprint $table){
//            $table->increments('id');
//            $table->tinyInteger('device_id')->unsigned();
//            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade')->onUpdate('cascade');
//
//            $table->integer('stats_id')->unsigned();
//            $table->foreign('stats_id')->references('id')->on('stats')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('stats');
    }
}
