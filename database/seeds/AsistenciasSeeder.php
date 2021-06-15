<?php

use Illuminate\Database\Seeder;
use pen\Alumno;
use pen\Asignatura;

class AsistenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asistencia = new Asistencia();
        $asistencia->numero_horas = '3';
        $alumno = Alumno::where('nombre', 'Andrés')->first();
        $asistencia->alumno()->associate($alumno);
        $asignatura = Asignatura::where('nombre', 'Matemáticas')->first();
        $asistencia->asignatura()->associate($asignatura);
        $asistencia-save();

        $asistencia = new Asistencia();
        $asistencia->numero_horas = '1';
        $alumno = Alumno::where('nombre', 'Andrés')->first();
        $asistencia->alumno()->associate($alumno);
        $asignatura = Asignatura::where('nombre', 'Lengua y Castellano')->first();
        $asistencia->asignatura()->associate($asignatura);
        $asistencia-save();

        $asistencia = new Asistencia();
        $asistencia->numero_horas = '3';
        $alumno = Alumno::where('nombre', 'Andrés')->first();
        $asistencia->alumno()->associate($alumno);
        $asignatura = Asignatura::where('nombre', 'Educación física')->first();
        $asistencia->asignatura()->associate($asignatura);
        $asistencia-save();

        $asistencia = new Asistencia();
        $asistencia->numero_horas = '3';
        $alumno = Alumno::where('nombre', 'Andrés')->first();
        $asistencia->alumno()->associate($alumno);
        $asignatura = Asignatura::where('nombre', 'Informática')->first();
        $asistencia->asignatura()->associate($asignatura);
        $asistencia-save();

        $asistencia = new Asistencia();
        $asistencia->numero_horas = '3';
        $alumno = Alumno::where('nombre', 'Andrés')->first();
        $asistencia->alumno()->associate($alumno);
        $asignatura = Asignatura::where('nombre', 'Física y Química')->first();
        $asistencia->asignatura()->associate($asignatura);
        $asistencia-save();

    }
}
