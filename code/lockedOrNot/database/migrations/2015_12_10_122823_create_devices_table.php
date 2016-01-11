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
            $table->integer('stats_id');
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
//        Schema::drop('device_user');
        Schema::drop('devices');
    }
}
