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
        $departamento->nombre = '';
        $departamento->descripcion = '';
        $departamento->estado = '';
        $departamento->save();
    }
}
