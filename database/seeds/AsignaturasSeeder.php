<?php

use Illuminate\Database\Seeder;
use pen\Asignatura;
use pen\Curso;
use pen\Aula;

class AsignaturasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asignatura = new Asignatura();
        $asignatura->nombre = 'Lengua y Castellano';
        $asignatura->descripcion = 'lengua y literatura';
        $curso = Curso::where('nombre', 'ESO1')->first();
        $asignatura->curso()->associate($curso);
        $aula = Aula::where('etiqueta', 'A1')->first();
        $asignatura->aula()->associate($aula);
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = 'Matemáticas';
        $asignatura->descripcion = 'álgebra y cálculo';
        $curso = Curso::where('nombre', 'ESO1')->first();
        $asignatura->curso()->associate($curso);
        $aula = Aula::where('etiqueta', 'A1')->first();
        $asignatura->aula()->associate($aula);
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = 'Inglés';
        $asignatura->descripcion = 'Lengua extranjera';
        $curso = Curso::where('nombre', 'ESO1')->first();
        $asignatura->curso()->associate($curso);
        $aula = Aula::where('etiqueta', 'A1')->first();
        $asignatura->aula()->associate($aula);
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = 'Educación Física';
        $asignatura->descripcion = 'ESO1';
        $curso = Curso::where('nombre', 'ESO1')->first();
        $asignatura->curso()->associate($curso);
        $aula = Aula::where('etiqueta', 'A1')->first();
        $asignatura->aula()->associate($aula);
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = 'Informática';
        $asignatura->descripcion = 'informática';
        $curso = Curso::where('nombre', 'ESO1')->first();
        $asignatura->curso()->associate($curso);
        $aula = Aula::where('etiqueta', 'A1')->first();
        $asignatura->aula()->associate($aula);
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = 'Física y Química';
        $asignatura->descripcion = 'Ciencias aplicadas';
        $curso = Curso::where('nombre', 'ESO1')->first();
        $asignatura->curso()->associate($curso);
        $aula = Aula::where('etiqueta', 'A1')->first();
        $asignatura->aula()->associate($aula);
        $asignatura->save();

    }
}
