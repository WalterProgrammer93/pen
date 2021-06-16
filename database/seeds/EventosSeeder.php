<?php

use Illuminate\Database\Seeder;
use pen\Evento;
use pen\Aula;

class EventosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $evento = new Evento();
        $evento->nombre = 'Graduación de 4º ESO';
        $evento->descripcion = 'Finalización estudiantil de los alumnos en la secundaria';
        $evento->disponibilidad = 'disponible';
        $aula = Aula::where('etiqueta', 'C7')->first();
        $evento->aula()->associate($aula);
        $evento->save();

        $evento = new Evento();
        $evento->nombre = 'Charla de automoción';
        $evento->descripcion = 'Charla para los alumnos de CFGS';
        $evento->disponibilidad = 'disponible';
        $aula = Aula::where('etiqueta', 'A1')->first();
        $evento->aula()->associate($aula);
        $evento->save();

        $evento = new Evento();
        $evento->nombre = 'Olimpiadas de mates';
        $evento->descripcion = 'Competición de los alumnos de la ESO';
        $evento->disponibilidad = 'disponible';
        $aula = Aula::where('etiqueta', 'B6')->first();
        $evento->aula()->associate($aula);
        $evento->save();

        $evento = new Evento();
        $evento->nombre = 'Charla de tecno';
        $evento->descripcion = 'Intervención de profesores para orientar a los alumnos a escoger carrera';
        $evento->disponibilidad = 'disponible';
        $aula = Aula::where('etiqueta', 'C4')->first();
        $evento->aula()->associate($aula);
        $evento->save();

        $evento = new Evento();
        $evento->nombre = 'Salida al sella';
        $evento->descripcion = 'Viaje de los alumnos de 4º ESO al descenso del sella';
        $evento->disponibilidad = 'disponible';
        $aula = Aula::where('etiqueta', 'A5')->first();
        $evento->aula()->associate($aula);
        $evento->save();
    }
}
