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
        	['rol' => 'Administrador'],
        ]);
        DB::table('perfils')->insert([
            ['rol' => 'Estudiante'],
        ]);
        DB::table('perfils')->insert([
            ['rol' => 'Profesor'],
        ]);
        DB::table('perfils')->insert([
            ['rol' => 'Invitado'],
        ]);
    }
}
