<?php

namespace pen\Imports;

use pen\Curso;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImportCurso implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Curso([
            //
        ]);
    }
}
