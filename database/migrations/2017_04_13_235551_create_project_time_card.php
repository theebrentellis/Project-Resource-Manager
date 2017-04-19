<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTimeCard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_time_card', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->integer('developer_time_card_id');
            $table->timestamps();
        });

        Schema::table("projects", function(Blueprint $table){
            $table->integer("project_time_card_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_time_card');
    }
}
