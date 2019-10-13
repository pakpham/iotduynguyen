<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataSensor4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('data_sensor_4', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ss1');
            $table->integer('ss2');
            $table->integer('ss3');
            $table->integer('ss4');
            $table->integer('id_station'); 
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
        //
    }
}
