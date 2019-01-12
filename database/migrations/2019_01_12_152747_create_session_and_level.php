<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionAndLevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ident');
            $table->string('label');
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->date('date_start');
            $table->date('date_end');
            $table->timestamps();
        });

        Artisan::call('db:seed', array('--class' => 'PopulateLevelsAndSessions'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('session_and_level');
    }
}
