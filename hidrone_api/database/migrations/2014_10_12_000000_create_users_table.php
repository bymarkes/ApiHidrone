<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuari', function (Blueprint $table) {
            $table->increments('idUsuari');
            $table->string('nom');
            $table->string('cognom');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->date('alta_usuari');
            $table->integer('n_drones');
            $table->integer('n_vols');
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
