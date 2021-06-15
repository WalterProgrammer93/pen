<?php

use Illuminate\Database\Seeder;
use pen\Alumno;
use pen\Curso;

class AlumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alumno = new Alumno();
        $alumno->nombre = 'Andrés';
        $alumno->apellido1 = 'Rojas';
        $alumno->apellido2 = 'Fuentes';
        $alumno->dni = '83482945O';
        $alumno->fecha_nacimiento = '2001/03/05';
        $alumno->telefono = '834829476';
        $alumno->correo = 'andres.rojas01@gmail.com';
        $alumno->sexo = 'M';
        $alumno->ciudad = 'Santander';
        $alumno->provincia = 'Cantabria';
        $alumno->nacionalidad = 'Española';
        $alumno->codigo_postal = '87100';
        $alumno->direccion = 'El sardinero';
        $alumno->portal = '5';
        $alumno->piso = '2';
        $alumno->letra = 'A';
        $alumno->repite = 'No';
        $alumno->foto = 'C:\Users\Usuario\Pictures\llorente.jpg';
        $curso = Curso::where('nombre', 'DAW2')->first();
        $alumno->curso()->associate($curso);
        $alumno->save();

        $alumno = new Alumno();
        $alumno->nombre = 'Julio';
        $alumno->apellido1 = 'Contreras';
        $alumno->apellido2 = 'Zuloaga';
        $alumno->dni = '93482194U';
        $alumno->fecha_nacimiento = '1995/11/15';
        $alumno->telefono = '934578294';
        $alumno->correo = 'julio.contreras95@gmail.com';
        $alumno->sexo = 'M';
        $alumno->ciudad = 'Barcelona';
        $alumno->provincia = 'Cataluña';
        $alumno->nacionalidad = 'Española';
        $alumno->codigo_postal = '76874';
        $alumno->direccion = 'Los culés';
        $alumno->portal = '6';
        $alumno->piso = '4';
        $alumno->letra = 'B';
        $alumno->repite = 'No';
        $alumno->foto = 'C:\Users\Usuario\Pictures\luisenrique.jpg';
        $curso = Curso::where('nombre', 'DAW1')->first();
        $alumno->curso()->associate($curso);
        $alumno->save();

        $alumno = new Alumno();
        $alumno->nombre = 'Oscar';
        $alumno->apellido1 = 'Zambrano';
        $alumno->apellido2 = 'López';
        $alumno->dni = '93472845I';
        $alumno->fecha_nacimiento = '1999/08/20';
        $alumno->telefono = '562967485';
        $alumno->correo = 'oscar.lopez99@educantabria.es';
        $alumno->sexo = 'M';
        $alumno->ciudad = 'Madrid';
        $alumno->provincia = 'C.Madrid';
        $alumno->nacionalidad = 'Española';
        $alumno->codigo_postal = '56823';
        $alumno->direccion = 'Los galacticos';
        $alumno->portal = '3';
        $alumno->piso = '5';
        $alumno->letra = 'C';
        $alumno->repite = 'Si';
        $alumno->foto = 'C:\Users\Usuario\Pictures\morata.jpg';
        $curso = Curso::where('nombre', 'DAW1')->first();
        $alumno->curso()->associate($curso);
        $alumno->save();

        $alumno = new Alumno();
        $alumno->nombre = 'Carlos';
        $alumno->apellido1 = 'Donovan';
        $alumno->apellido2 = 'Jiménez';
        $alumno->dni = '17458245J';
        $alumno->fecha_nacimiento = '2000/04/17';
        $alumno->telefono = '437295648';
        $alumno->correo = 'carlos.donovan@gmail.com';
        $alumno->sexo = 'M';
        $alumno->ciudad = 'Bilbao';
        $alumno->provincia = 'P.Vasco';
        $alumno->nacionalidad = 'Española';
        $alumno->codigo_postal = '54200';
        $alumno->direccion = 'Los leones';
        $alumno->portal = '2';
        $alumno->piso = '5';
        $alumno->letra = 'B';
        $alumno->repite = 'Si';
        $alumno->foto = 'C:\Users\Usuario\Pictures\joaquin.jpg';
        $curso = Curso::where('nombre', 'DAW1')->first();
        $alumno->curso()->associate($curso);
        $alumno->save();

        $alumno = new Alumno();
        $alumno->nombre = 'Gabriela';
        $alumno->apellido1 = 'Montés';
        $alumno->apellido2 = 'Velasco';
        $alumno->dni = '78382965H';
        $alumno->fecha_nacimiento = '2001/12/23';
        $alumno->telefono = '945823564';
        $alumno->correo = 'gabriela.montes01@gmail.com';
        $alumno->sexo = 'F';
        $alumno->ciudad = 'Benidorm';
        $alumno->provincia = 'C.Valenciana';
        $alumno->nacionalidad = 'Española';
        $alumno->codigo_postal = '46001';
        $alumno->direccion = 'Los mestañazos';
        $alumno->portal = '6';
        $alumno->piso = '3';
        $alumno->letra = 'C';
        $alumno->repite = 'Si';
        $alumno->foto = 'C:\Users\Usuario\Pictures\aitanabonmati.jpg';
        $curso = Curso::where('nombre', 'DAM1')->first();
        $alumno->curso()->associate($curso);
        $alumno->save();
    }
}
