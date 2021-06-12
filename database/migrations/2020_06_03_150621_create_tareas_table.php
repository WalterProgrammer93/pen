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
            $table->increments('id');
            $table->string('titulo',20)->unique();
            $table->string('descripcion',100);
            $table->string('autor',20)->unique();
            $table->date('fecha_subida');
            $table->date('fecha_entrega');
            $table->time('hora_entrega');
            $table->string('documento_tarea',255);
            $table->string('subir_documento',255)->nullable();
            $table->integer('calificacion')->unsigned()->nullable();
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
