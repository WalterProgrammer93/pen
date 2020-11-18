<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('alumno_id');
            $table->string('nombre',100);
            $table->string('apellido1',100);
            $table->string('apellido2',100)->nullable();
            $table->char('dni',9)->unique();
            $table->date('fecha_nacimiento');
            $table->char('telefono',9)->unique();
            $table->string('correo',100)->unique();
            $table->char('sexo',1);
            $table->string('ciudad',100);
            $table->string('provincia',100);
            $table->string('nacionalidad',100);
            $table->char('codigo_postal',5);
            $table->string('direccion',100);
            $table->integer('portal')->length('2')->unsigned();
            $table->integer('piso')->length('2')->unsigned();
            $table->char('letra',1);
            $table->string('repite',2);
            $table->string('foto',255);
            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->references('curso_id')->on('cursos');
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
        Schema::dropIfExists('alumnos');
    }
}
