<?php

use Illuminate\Database\Seeder;
use pen\Reserva;
use pen\Profesor;
use pen\Evento;
use pen\Aula;

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
        $aula = Aula::where('etiqueta', 'A1')->first();
        $reserva->aula()->associate($aula);
        $reserva->descripcion = '11:45 a 13:00';
        $reserva->reservado = 'Si';
        $reserva->save();

        $reserva = new Reserva();
        $profesor = Profesor::where('nombre', 'Carlos')->first();
        $reserva->profesor()->associate($profesor);
        $evento = Evento::where('nombre', 'Olimpiadas de mates')->first();
        $reserva->evento()->associate($evento);
        $aula = Aula::where('etiqueta', 'B6')->first();
        $reserva->aula()->associate($aula);
        $reserva->descripcion = '15:00 a 17:00';
        $reserva->reservado = 'Si';
        $reserva->save();

        $reserva = new Reserva();
        $profesor = Profesor::where('nombre', 'Lucia')->first();
        $reserva->profesor()->associate($profesor);
        $evento = Evento::where('nombre', 'Charla de automocion')->first();
        $reserva->evento()->associate($evento);
        $aula = Aula::where('etiqueta', 'C7')->first();
        $reserva->aula()->associate($aula);
        $reserva->descripcion = '13:00 a 15:00';
        $reserva->reservado = 'Si';
        $reserva->save();

        $reserva = new Reserva();
        $profesor = Profesor::where('nombre', 'Carlos')->first();
        $reserva->profesor()->associate($profesor);
        $evento = Evento::where('nombre', 'Charla de tecno')->first();
        $reserva->evento()->associate($evento);
        $aula = Aula::where('etiqueta', 'B7')->first();
        $reserva->aula()->associate($aula);
        $reserva->descripcion = '18:30 a 20:30';
        $reserva->reservado = 'Si';
        $reserva->save();

        $reserva = new Reserva();
        $profesor = Profesor::where('nombre', 'María')->first();
        $reserva->profesor()->associate($profesor);
        $evento = Evento::where('nombre', 'Salida al sella')->first();
        $reserva->evento()->associate($evento);
        $aula = Aula::where('etiqueta', 'A7')->first();
        $reserva->aula()->associate($aula);
        $reserva->descripcion = '18:30 a 19:30';
        $reserva->reservado = 'Si';
        $reserva->save();
    }
}
