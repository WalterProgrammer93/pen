<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',10)->unique();
            $table->integer('eva1')->length(2)->unsigned();
            $table->integer('eva2')->length(2)->unsigned();
            $table->integer('eva3')->length(2)->unsigned();
            $table->integer('media')->length(2)->unsigned();
            $table->integer('alumno_id')->unsigned();
            $table->integer('asignatura_id')->unsigned();
            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');
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
        Schema::dropIfExists('notas');
    }
}
