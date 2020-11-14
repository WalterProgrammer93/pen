<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class Perfiles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('perfils')->insert([
        	['codigo' => '8A49F83J5F', 'rol' => 'Administrador'],
        ]);
        DB::table('perfils')->insert([
            ['codigo' => 'K302NH9RRL', 'rol' => 'Estudiante'],
        ]);
        DB::table('perfils')->insert([
            ['codigo' => '2O3NF939D2', 'rol' => 'Profesor'],
        ]);
        DB::table('perfils')->insert([
            ['codigo' => '1L06H5BS40', 'rol' => 'Invitado'],
        ]);
    }
}
