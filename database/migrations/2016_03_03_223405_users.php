<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users',function(Blueprint $table){
            $table->increments('userId');
            $table->string('userName',100);
            $table->string('userNickName',50);
            $table->string('userPassword');
            $table->string('userEmail')->unique();
            $table->text('userToken');
            $table->text('userAvatar');
            $table->blob('userImage');
            $table->string('userBloodGroup');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
