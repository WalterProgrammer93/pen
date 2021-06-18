<?php

use Illuminate\Database\Seeder;
use pen\Clase;
use pen\Asignatura;
use pen\Profesor;

class ClaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clase = new Clase();
        $asignatura = Asignatura::where('nombre', 'Matemáticas')->first();
        $clase->asignatura()->associate($asignatura);
        $profesor = Profesor::where('nombre', 'Martín')->first();
        $clase->profesor()->associate($profesor);
        $clase->horario = '09:45 a 10:30';

        $clase = new Clase();
        $asignatura = Asignatura::where('nombre', 'Lengua y Castellano')->first();
        $clase->asignatura()->associate($asignatura);
        $profesor = Profesor::where('nombre', 'Antonio')->first();
        $clase->profesor()->associate($profesor);
        $clase->horario = '08:30 a 09:30';

        $clase = new Clase();
        $asignatura = Asignatura::where('nombre', 'Educación física')->first();
        $clase->asignatura()->associate($asignatura);
        $profesor = Profesor::where('nombre', 'Lucía')->first();
        $clase->profesor()->associate($profesor);
        $clase->horario = '10:50 a 11:30';

        $clase = new Clase();
        $asignatura = Asignatura::where('nombre', 'Inglés')->first();
        $clase->asignatura()->associate($asignatura);
        $profesor = Profesor::where('nombre', 'María')->first();
        $clase->profesor()->associate($profesor);
        $clase->horario = '12:00 a 13:30';

        $clase = new Clase();
        $asignatura = Asignatura::where('nombre', 'Física y Química')->first();
        $clase->asignatura()->associate($asignatura);
        $profesor = Profesor::where('nombre', 'Carlos')->first();
        $clase->profesor()->associate($profesor);
        $clase->horario = '13:30 a 14:30';
    }
}
