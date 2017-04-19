<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeveloperTimeCard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developer_time_card', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('developer_id');
            $table->integer('project_time_card_id');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('time');
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
        Schema::dropIfExists('developer_time_card');
    }
}
