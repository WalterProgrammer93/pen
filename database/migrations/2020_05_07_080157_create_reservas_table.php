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
            $table->string('descripcion',255)->nullable();
            $table->string('reservado',100);
            $table->integer('profesor_id')->unsigned();
            $table->integer('evento_id')->unsigned();
            $table->foreign('profesor_id')->references('id')->on('profesors');
            $table->foreign('evento_id')->references('id')->on('eventos');
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
        Schema::dropIfExists('reservas');
    }
}
