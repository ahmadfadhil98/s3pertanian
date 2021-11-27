<?php

namespace App\Imports;

use App\Models\Lecturer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LecturerImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $gelar = explode(',', $row['gelar']);
        return new Lecturer([
            'id' => $row['nip'],
            'nip' => $row['nip'],
            'faculty' => 11,
            'name' => $gelar[0].$row['nama'].$gelar[1]

        ]);
    }
}
