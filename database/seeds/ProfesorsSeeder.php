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
        $profesor->curso()->associate($departamento);
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
        $profesor->curso()->associate($departamento);
        $profesor->save();

        $profesor = new Profesor();
        $profesor->nombre = '';
        $profesor->apellido1 = '';
        $profesor->apellido2 = '';
        $profesor->dni = '';
        $profesor->email = '';
        $profesor->telefono = '';
        $profesor->disponibilidad = '';
        $departamento = Departamento::where('nombre', 'Lengua y literatura')->first();
        $profesor->curso()->associate($departamento);
        $profesor->save();

        $profesor = new Profesor();
        $profesor->nombre = '';
        $profesor->apellido1 = '';
        $profesor->apellido2 = '';
        $profesor->dni = '';
        $profesor->email = '';
        $profesor->telefono = '';
        $profesor->disponibilidad = '';
        $departamento = Departamento::where('nombre', 'Lengua y literatura')->first();
        $profesor->curso()->associate($departamento);
        $profesor->save();

        $profesor = new Profesor();
        $profesor->nombre = '';
        $profesor->apellido1 = '';
        $profesor->apellido2 = '';
        $profesor->dni = '';
        $profesor->email = '';
        $profesor->telefono = '';
        $profesor->disponibilidad = '';
        $departamento = Departamento::where('nombre', 'Lengua y literatura')->first();
        $profesor->curso()->associate($departamento);
        $profesor->save();
    }
}
