<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('label');
            $table->timestamps();
        });
        $type = [
            'dev' => 'Developer',
            'designer' => 'Designer',
            'pm' => 'Project Manager',
            'admin' => 'Admin'
        ];
        foreach($type as $slug => $label){
            DB::table('user_type')->insert([
                'slug' => $slug,
                'label' => $label
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_type');
    }
}
