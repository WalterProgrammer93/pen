<?php

use Illuminate\Database\Seeder;
use pen\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->nombre = 'Walter';
        $user->email = 'walter21@gmail.com';
        $user->password = bcrypt('walter21@');
        $user->save();

        $user = new User();
        $user->nombre = 'Ismael';
        $user->email = 'ismael21@gmail.com';
        $user->password = bcrypt('ismael21@');
        $user->save();

        $user = new User();
        $user->nombre = 'Javier';
        $user->email = 'javier21@gmail.com';
        $user->password = bcrypt('javier21@');
        $user->save();

        $user = new User();
        $user->nombre = 'Carla';
        $user->email = 'carla21@gmail.ibase_commit';
        $user->password = bcrypt('carla21@');
        $user->save();
    }
}
