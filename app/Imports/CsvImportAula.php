<?php

namespace pen\Imports;

use pen\Aula;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImportAula implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Aula([
            //
        ]);
    }
}
