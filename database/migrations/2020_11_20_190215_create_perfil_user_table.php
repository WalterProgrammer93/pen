<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('perfil_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('perfil_id')->references('perfil_id')->on('perfils');
            $table->foreign('user_id')->references('user_id')->on('users');
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
        Schema::dropIfExists('perfil_user');
    }
}
