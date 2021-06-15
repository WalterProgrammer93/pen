<?php

use Illuminate\Database\Seeder;
use pen\Tema;

class TemasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tema = new Tema();
        $tema->nombre = 'Ánalisis sintáctico y semántico';
        $tema->contenido = 'enunciados, temas, oraciones';
        $tema->documento_tema = 'C:\Users\Usuario\Downloads\Resistencia de materiales y estructuras.pdf';
        $tema->save();

        $tema = new Tema();
        $tema->nombre = 'Álgebra y cálculo';
        $tema->contenido = 'matrices, gauss';
        $tema->documento_tema = 'C:\Users\Usuario\Downloads\Probabilidad y Estadística. Aplicaciones y Métodos ( PDFDrive ).pdf';
        $tema->save();

        $tema = new Tema();
        $tema->nombre = 'La gimnasia en los colegios';
        $tema->contenido = 'deportes, gimnasia';
        $tema->documento_tema = 'C:\Users\Usuario\Downloads\CV-Walter2021.pdf';
        $tema->save();

        $tema = new Tema();
        $tema->nombre = 'La conversiones de las medidas';
        $tema->contenido = 'formulas, ecuaciones';
        $tema->documento_tema = 'C:\Users\Usuario\Downloads\02_Herencia.pdf';
        $tema->save();

        $tema = new Tema();
        $tema->nombre = 'Vocabulario y oraciones';
        $tema->contenido = 'crear y formar oraciones';
        $tema->documento_tema = 'C:\Users\Usuario\Downloads\03_Polimorfismo.pdf';
        $tema->save();

    }
}
