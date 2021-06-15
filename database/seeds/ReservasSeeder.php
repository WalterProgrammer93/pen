<?php

use Illuminate\Database\Seeder;
use pen\Reserva;

class ReservasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reserva = new Reserva();
        $profesor = Profesor::where('nombre', 'Martín')->first();
        $reserva->profesor()->associate($profesor);
        $evento = Evento::where('nombre', 'Graduación de 4º ESO')->first();
        $reserva->evento()->associate($evento);
        $aula = Aula::where('nombre', 'A1')->first();
        $reserva->aula()->associate($aula);
        $reserva->descripcion = '11:45 a 13:00';
        $reserva->reservado = 'Si';
        $reserva->save();

        $reserva = new Reserva();
        $profesor = Profesor::where('nombre', 'Carlos')->first();
        $reserva->profesor()->associate($profesor);
        $evento = Evento::where('nombre', 'Olimpiadas de matemáticas')->first();
        $reserva->evento()->associate($evento);
        $aula = Aula::where('nombre', 'B6')->first();
        $reserva->aula()->associate($aula);
        $reserva->descripcion = '15:00 a 17:00';
        $reserva->reservado = 'Si';
        $reserva->save();

        $reserva = new Reserva();
        $profesor = Profesor::where('nombre', 'Lucia')->first();
        $reserva->profesor()->associate($profesor);
        $evento = Evento::where('nombre', 'Graduación de 2º Bachillerato')->first();
        $reserva->evento()->associate($evento);
        $aula = Aula::where('nombre', 'C7')->first();
        $reserva->aula()->associate($aula);
        $reserva->descripcion = '13:00 a 15:00';
        $reserva->reservado = 'Si';
        $reserva->save();

        $reserva = new Reserva();
        $profesor = Profesor::where('nombre', 'Carlos')->first();
        $reserva->profesor()->associate($profesor);
        $evento = Evento::where('nombre', 'Charla de nuevas carreras tecnologicas')->first();
        $reserva->evento()->associate($evento);
        $aula = Aula::where('nombre', 'B7')->first();
        $reserva->aula()->associate($aula);
        $reserva->descripcion = '18:30 a 20:30';
        $reserva->reservado = 'Si';
        $reserva->save();

        $reserva = new Reserva();
        $profesor = Profesor::where('nombre', 'María')->first();
        $reserva->profesor()->associate($profesor);
        $evento = Evento::where('nombre', 'Salida a descenso del sella')->first();
        $reserva->evento()->associate($evento);
        $aula = Aula::where('nombre', 'A7')->first();
        $reserva->aula()->associate($aula);
        $reserva->descripcion = '18:30 a 19:30';
        $reserva->reservado = 'Si';
        $reserva->save();
    }
}
