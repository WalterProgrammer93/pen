<?php

use Illuminate\Database\Seeder;
use pen\Departamento;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departamento = new Departamento();
        $departamento->nombre = 'Lengua y literatura';
        $departamento->descripcion = 'Planta baja';
        $departamento->estado = 'Abierto';
        $departamento->save();

        $departamento = new Departamento();
        $departamento->nombre = 'Matemáticas y Informática';
        $departamento->descripcion = 'Planta baja';
        $departamento->estado = 'Abierto';
        $departamento->save();

        $departamento = new Departamento();
        $departamento->nombre = 'Lengua extranjera y idiomas';
        $departamento->descripcion = 'Planta baja';
        $departamento->estado = 'Abierto';
        $departamento->save();

        $departamento = new Departamento();
        $departamento->nombre = 'Ciencias y tecnología';
        $departamento->descripcion = 'Tercera planta';
        $departamento->estado = 'Cerrado';
        $departamento->save();

        $departamento = new Departamento();
        $departamento->nombre = 'Educación y filosofía';
        $departamento->descripcion = 'Tercera planta';
        $departamento->estado = '';
        $departamento->save();
    }
}
