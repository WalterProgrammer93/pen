<?php

use Illuminate\Database\Seeder;
use App\Perfil;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin = Perfil::where('perfil', 'admin')->first();
      $role_student = Perfil::where('perfil', 'student')->first();
      $role_teacher = Perfil::where('perfil', 'teacher')->first();
      $role_user = Perfil::where('perfil', 'user')->first();

      $user = new User();
      $user->nombre = 'Walter';
      $user->email = 'walter@gmail.com';
      $user->password = bcrypt('walter@');
      $user->save();
      $user->perfils()->attach($role_admin);

      $user = new User();
      $user->nombre = 'Ignacio';
      $user->email = 'ignacio@gmail.com';
      $user->password = bcrypt('ignacio@');
      $user->save();
      $user->perfils()->attach($role_student);

      $user = new User();
      $user->nombre = 'Javi';
      $user->email = 'javi@gmail.com';
      $user->password = bcrypt('javi@');
      $user->save();
      $user->perfils()->attach($role_teacher);

      $user = new User();
      $user->nombre = 'Carlos';
      $user->email = 'carlos@gmail.com';
      $user->password = bcrypt('carlos@');
      $user->save();
      $user->perfils()->attach($role_user);


    }
}
