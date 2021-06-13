<?php

namespace pen\Imports;

use pen\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Hash;

class CsvImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'nombre' => $row["nombre"],
            'email' => $row["email"],
            'password' => Hash::make($row["password"]),
        ]);
    }
}
