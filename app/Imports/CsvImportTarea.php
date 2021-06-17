<?php

namespace pen\Imports;

use pen\Tarea;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImportTarea implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tarea([
            //
        ]);
    }
}
