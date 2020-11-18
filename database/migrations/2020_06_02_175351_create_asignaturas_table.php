<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->increments('asignatura_id');
            $table->string('nombre',100)->unique();
            $table->string('descripcion',255)->nullable();
            $table->integer('curso_id')->unsigned();
            $table->integer('aula_id')->unsigned();
            $table->foreign('curso_id')->references('curso_id')->on('cursos');
            $table->foreign('aula_id')->references('aula_id')->on('aulas');
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
        Schema::dropIfExists('asignaturas');
    }
}
