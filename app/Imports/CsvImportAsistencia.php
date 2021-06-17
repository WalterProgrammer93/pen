<?php

namespace pen\Imports;

use pen\Asistencia;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImportAsistencia implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Asistencia([
            //
        ]);
    }
}
