<?php

namespace pen\Imports;

use pen\Alumno;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImportAlumno implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Alumno([
            //
        ]);
    }
}
