<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->increments('tarea_id');
            $table->string('titulo',100)->unique();
            $table->string('descripcion',100);
            $table->string('autor',100)->unique();
            $table->date('fecha_envio');
            $table->date('fecha_entrega');
            $table->time('hora_entrega');
            $table->string('archivo_tarea',255);
            $table->integer('calificacion')->length('2')->unsigned();
            $table->integer('asignatura_id')->unsigned();
            $table->integer('tema_id')->unsigned();
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');
            $table->foreign('tema_id')->references('id')->on('temas');
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
        Schema::dropIfExists('tareas');
    }
}
