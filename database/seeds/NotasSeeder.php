<?php

use Illuminate\Database\Seeder;
use pen\Nota;
use pen\Alumno;
use pen\Asignatura;

class NotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nota = new Nota();
        $nota->eva1 = '4';
        $nota->eva2 = '5';
        $nota->eva3 = '6';
        $nota->media = '5';
        $alumno = Alumno::where('nombre', 'Andrés')->first();
        $nota->alumno()->associate($alumno);
        $asignatura = Asignatura::where('nombre', 'Lengua y Castellano')->first();
        $nota->asignatura()->associate($asignatura);
        $nota->save();

        $nota = new Nota();
        $nota->eva1 = '5';
        $nota->eva2 = '7';
        $nota->eva3 = '8';
        $nota->media = '6';
        $alumno = Alumno::where('nombre', 'Andrés')->first();
        $nota->alumno()->associate($alumno);
        $asignatura = Asignatura::where('nombre', 'Educación física')->first();
        $nota->asignatura()->associate($asignatura);
        $nota->save();

        $nota = new Nota();
        $nota->eva1 = '3';
        $nota->eva2 = '4';
        $nota->eva3 = '4';
        $nota->media = '3';
        $alumno = Alumno::where('nombre', 'Andrés')->first();
        $nota->alumno()->associate($alumno);
        $asignatura = Asignatura::where('nombre', 'Física y Química')->first();
        $nota->asignatura()->associate($asignatura);
        $nota->save();

        $nota = new Nota();
        $nota->eva1 = '6';
        $nota->eva2 = '7';
        $nota->eva3 = '9';
        $nota->media = '7';
        $alumno = Alumno::where('nombre', 'Andrés')->first();
        $nota->alumno()->associate($alumno);
        $asignatura = Asignatura::where('nombre', 'Informática')->first();
        $nota->asignatura()->associate($asignatura);
        $nota->save();

    }
}
