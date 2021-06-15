<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(PerfilsTableSeeder::class);    // Los usuarios necesitarán los roles previamente generados
      $this->call(UsersSeeder::class);
      $this->call(CursosSeeder::class);
      $this->call(AlumnosSeeder::class);
      $this->call(AulasSeeder::class);
      $this->call(AsignaturasSeeder::class);
      $this->call(DepartamentosSeeder::class);
      $this->call(ProfesorsSeeder::class);
      $this->call(NotasSeeder::class);
      $this->call(ClaseSeeder::class);
      $this->call(AsistenciasSeeder::class);
      $this->call(EventosSeeder::class);
      $this->call(ReservasSeeder::class);
      $this->call(TemasSeeder::class);
      $this->call(TareasSeeder::class);
      $this->call(RoleSeeder::class);*/
    }
}
