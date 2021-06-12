<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profesor_id')->unsigned();
            $table->integer('evento_id')->unsigned();
            $table->integer('aula_id')->unsigned();
            $table->string('descripcion',100)->nullable();
            $table->char('reservado',2);
            $table->foreign('profesor_id')->references('id')->on('profesors');
            $table->foreign('evento_id')->references('id')->on('eventos');
            $table->foreign('aula_id')->references('id')->on('aulas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
