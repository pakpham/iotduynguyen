<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WarningSetup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warning_setup', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ss1');
            $table->tinyInteger('ss1_sign')->default(1);
            $table->integer('ss2');
            $table->tinyInteger('ss2_sign')->default(1);
            $table->integer('ss3');
            $table->tinyInteger('ss3_sign')->default(1);
            $table->integer('ss4');
            $table->tinyInteger('ss4_sign')->default(1);

            $table->integer('id_station')->unique(); 
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
