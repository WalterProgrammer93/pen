<?php

use Illuminate\Database\Seeder;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $curso = new Curso();
        $curso->nombre = 'ESO1';
        $curso->descripcion = 'Primero de la educación secundaria obligatoria';
        $curso->save();

        $curso = new Curso();
        $curso->nombre = 'ESO2';
        $curso->descripcion = 'Segundo de la educación secundaria obligatoria';
        $curso->save();

        $curso = new Curso();
        $curso->nombre = 'ESO3';
        $curso->descripcion = 'Tercero de la educación secundaria obligatoria';
        $curso->save();

        $curso = new Curso();
        $curso->nombre = 'ESO4';
        $curso->descripcion = 'Cuarto de la educación secundaria obligatoria';
        $curso->save();

        $curso = new Curso();
        $curso->nombre = 'Bachiller1';
        $curso->descripcion = 'Primero de bachillerato';
        $curso->save();

        $curso = new Curso();
        $curso->nombre = 'Bachiller2';
        $curso->descripcion = 'Segundo de bachillerato';
        $curso->save();

        $curso = new Curso();
        $curso->nombre = 'ESO1';
        $curso->descripcion = 'Primero de la educación secundaria obligatoria';
        $curso->save();

        $curso = new Curso();
        $curso->nombre = 'ESO1';
        $curso->descripcion = 'Primero de la educación secundaria obligatoria';
        $curso->save();

        $curso = new Curso();
        $curso->nombre = 'SMR1';
        $curso->descripcion = 'Primero de sistemas microinformáticos y redes';
        $curso->save();

        $curso = new Curso();
        $curso->nombre = 'SMR2';
        $curso->descripcion = 'Segundo de sistemas microinformáticos y redes';
        $curso->save();

        $curso = new Curso();
        $curso->nombre = 'DAW1';
        $curso->descripcion = 'Primero de desarrollo de aplicaciones web';
        $curso->save();

        $curso = new Curso();
        $curso->nombre = 'DAW2';
        $curso->descripcion = 'Segundo de desarrollo de aplicaciones web';
        $curso->save();

        $curso = new Curso();
        $curso->nombre = 'DAM1';
        $curso->descripcion = 'Primero de desarrollo de aplicaciones multiplataforma';
        $curso->save();

        $curso = new Curso();
        $curso->nombre = 'DAM2';
        $curso->descripcion = 'Segundo de desarrollo de aplicaciones multiplataforma';
        $curso->save();
    }
}
