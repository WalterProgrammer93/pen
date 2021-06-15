<?php

use Illuminate\Database\Seeder;
use pen\Perfil;

class PerfilsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$role = new Perfil();
        $role->nombre = 'admin';
        $role->descripcion = 'Administrador';
        $role->save();*/
        $role = new Perfil();
        $role->nombre = 'student';
        $role->descripcion = 'Estudiante';
        $role->save();
        $role = new Perfil();
        $role->nombre = 'teacher';
        $role->descripcion = 'Profesor';
        $role->save();
        $role = new Perfil();
        $role->nombre = 'user';
        $role->descripcion = 'Usuario';
        $role->save();

    }
}
