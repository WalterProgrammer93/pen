<?php

use Illuminate\Database\Seeder;
use pen\Profesor;
use pen\Departamento;

class ProfesorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profesor = new Profesor();
        $profesor->nombre = 'Antonio';
        $profesor->apellido1 = 'Maneiro';
        $profesor->apellido2 = 'Rodriguez';
        $profesor->dni = '73482945L';
        $profesor->email = 'antonio.maneiro40@gmail.com';
        $profesor->telefono = '93549274';
        $profesor->disponibilidad = 'Disponible';
        $departamento = Departamento::where('nombre', 'Lengua y literatura')->first();
        $profesor->departamento()->associate($departamento);
        $profesor->save();

        $profesor = new Profesor();
        $profesor->nombre = 'Martín';
        $profesor->apellido1 = 'Castañeda';
        $profesor->apellido2 = 'Zambrano';
        $profesor->dni = '94568234J';
        $profesor->email = 'martin.castañeda35@gmail.com';
        $profesor->telefono = '845825648';
        $profesor->disponibilidad = 'No Disponible';
        $departamento = Departamento::where('nombre', 'Matemáticas y informática')->first();
        $profesor->departamento()->associate($departamento);
        $profesor->save();

        $profesor = new Profesor();
        $profesor->nombre = 'Lucia';
        $profesor->apellido1 = 'Fuentes';
        $profesor->apellido2 = 'Robles';
        $profesor->dni = '83462845H';
        $profesor->email = 'lucia.fuentes38@gmail.com';
        $profesor->telefono = '482384670';
        $profesor->disponibilidad = 'Disponible';
        $departamento = Departamento::where('nombre', 'Educación y filosofía')->first();
        $profesor->departamento()->associate($departamento);
        $profesor->save();

        $profesor = new Profesor();
        $profesor->nombre = 'Carlos';
        $profesor->apellido1 = 'Morán';
        $profesor->apellido2 = 'Martínez';
        $profesor->dni = '93483475L';
        $profesor->email = 'carlos.martinez35@gmail.com';
        $profesor->telefono = '078483925';
        $profesor->disponibilidad = 'Disponible';
        $departamento = Departamento::where('nombre', 'Ciencias y tecnologías')->first();
        $profesor->departamento()->associate($departamento);
        $profesor->save();

        $profesor = new Profesor();
        $profesor->nombre = 'María';
        $profesor->apellido1 = 'Lopera';
        $profesor->apellido2 = 'Velásquez';
        $profesor->dni = '53975927F';
        $profesor->email = 'maria.lopera34@gmai.com';
        $profesor->telefono = '569346583';
        $profesor->disponibilidad = 'Disponible';
        $departamento = Departamento::where('nombre', 'Lengua extranjera y idiomas')->first();
        $profesor->departamento()->associate($departamento);
        $profesor->save();
    }
}
