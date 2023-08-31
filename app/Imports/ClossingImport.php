<?php

namespace App\Imports;

use App\Models\Clossing;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClossingImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Clossing([
            'nama' => $row['nama'],
            'jeniskelamin' => $row['jeniskelamin'],
            'harga' => $row['harga'],
            'foto' => $row['foto'],
            'notlp' => $row['notlp'],
        ]);
    }
}
