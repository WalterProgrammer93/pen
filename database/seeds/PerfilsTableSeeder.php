<?php

use Illuminate\Database\Seeder;
use App\Perfil;

class PerfilsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Perfil();
        $role->perfil = 'admin';
        $role->descripcion = 'Administrador';
        $role->save();
        $role = new Perfil();
        $role->perfil = 'student';
        $role->descripcion = 'Estudiante';
        $role->save();
        $role = new Perfil();
        $role->perfil = 'teacher';
        $role->descripcion = 'Profesor';
        $role->save();
        $role = new Perfil();
        $role->perfil = 'user';
        $role->descripcion = 'Usuario';
        $role->save();

    }
}
