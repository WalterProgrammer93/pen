<?php

use Illuminate\Database\Seeder;
use pen\Roles;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Roles();
        $usuario = User::where('nombre', 'Walter')->first();
        $role->user()->associate($usuario);
        $perfil = Perfil::where('nombre', 'admin')->first();
        $role->perfil()->associate($perfil);
        $role->save();

        $role = new Roles();
        $usuario = User::where('nombre', 'Ismael')->first();
        $role->user()->associate($usuario);
        $perfil = Perfil::where('nombre', 'student')->first();
        $role->perfil()->associate($perfil);
        $role->save();

        $role = new Roles();
        $usuario = User::where('nombre', 'Javier')->first();
        $role->user()->associate($usuario);
        $perfil = Perfil::where('nombre', 'teacher')->first();
        $role->perfil()->associate($perfil);
        $role->save();

        $role = new Roles();
        $usuario = User::where('nombre', 'Carla')->first();
        $role->user()->associate($usuario);
        $perfil = Perfil::where('nombre', 'user')->first();
        $role->perfil()->associate($perfil);
        $role->save();
    }
}
