<?php

use Illuminate\Database\Seeder;
use pen\Tarea;
use pen\Asignatura;
use pen\Tema;

class TareasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tarea = new Tarea();
        $tarea->titulo = 'Ejercicios de matemáticas';
        $tarea->descripcion = 'Segunda evaluación de cara al examén';
        $tarea->autor = 'Martín Castañeda';
        $tarea->fecha_envio = '2021/06/15';
        $tarea->fecha_entrega = '2021/06/17';
        $tarea->hora_entrega = '19:30';
        $tarea->documento_tarea = 'C:\Users\Usuario\Desktop\PMDM\Tarea1.pdf';
        $tarea->subir_documento = '';
        $tarea->calificacion = '5';
        $asignatura = Asignatura::where('nombre', 'Matemáticas')->first();
        $tarea->asignatura()->associate($asignatura);
        $tema = Tema::where('nombre', 'Álgebra y cálculo')->first();
        $tarea->tema()->associate($tema);
        $tarea->save();

        $tarea = new Tarea();
        $tarea->titulo = 'Ejercicios de lengua';
        $tarea->descripcion = 'Segunda evaluación de cara al examén';
        $tarea->autor = 'Antonio Maneiro';
        $tarea->fecha_envio = '2021/06/15';
        $tarea->fecha_entrega = '2021/06/17';
        $tarea->hora_entrega = '13:30';
        $tarea->documento_tarea = 'C:\Users\Usuario\Desktop\PMDM\Tarea2.pdf';
        $tarea->subir_documento = '';
        $tarea->calificacion = '4';
        $asignatura = Asignatura::where('nombre', 'Lengua y Castellano')->first();
        $tarea->asignatura()->associate($asignatura);
        $tema = Tema::where('nombre', 'Ánalisis sintáctico y semántico')->first();
        $tarea->tema()->associate($tema);
        $tarea->save();

        $tarea = new Tarea();
        $tarea->titulo = 'Ejercicios de educación fisica';
        $tarea->descripcion = 'Segunda evaluación de cara al examén';
        $tarea->autor = 'Lucía Fuentes';
        $tarea->fecha_envio = '2021/06/15';
        $tarea->fecha_entrega = '2021/06/17';
        $tarea->hora_entrega = '12:30';
        $tarea->documento_tarea = 'C:\Users\Usuario\Desktop\PMDM\Tarea3.pdf';
        $tarea->subir_documento = '';
        $tarea->calificacion = '6';
        $asignatura = Asignatura::where('nombre', 'Educación física')->first();
        $tarea->asignatura()->associate($asignatura);
        $tema = Tema::where('nombre', 'La gimnasia en los colegios')->first();
        $tarea->tema()->associate($tema);
        $tarea->save();

        $tarea = new Tarea();
        $tarea->titulo = 'Ejercicios de física y química';
        $tarea->descripcion = 'Segunda evaluación de cara al examén';
        $tarea->autor = 'Carlos Morán';
        $tarea->fecha_envio = '2021/06/15';
        $tarea->fecha_entrega = '2021/06/17';
        $tarea->hora_entrega = '10:30';
        $tarea->documento_tarea = 'C:\Users\Usuario\Desktop\PMDM\Tarea4.pdf';
        $tarea->subir_documento = '';
        $tarea->calificacion = '7';
        $asignatura = Asignatura::where('nombre', 'Física y Química')->first();
        $tarea->asignatura()->associate($asignatura);
        $tema = Tema::where('nombre', 'La conversiones de las medidas')->first();
        $tarea->tema()->associate($tema);
        $tarea->save();

        $tarea = new Tarea();
        $tarea->titulo = 'Ejercicios de inglés';
        $tarea->descripcion = 'Segunda evaluación de cara al examén';
        $tarea->autor = 'María Lopera';
        $tarea->fecha_envio = '2021/06/15';
        $tarea->fecha_entrega = '2021/06/17';
        $tarea->hora_entrega = '09:30';
        $tarea->documento_tarea = 'C:\Users\Usuario\Desktop\PMDM\Tarea4B.pdf';
        $tarea->subir_documento = '';
        $tarea->calificacion = '6';
        $asignatura = Asignatura::where('nombre', 'Inglés')->first();
        $tarea->asignatura()->associate($asignatura);
        $tema = Tema::where('nombre', 'Vocabulario y oraciones')->first();
        $tarea->tema()->associate($tema);
        $tarea->save();

    }
}
