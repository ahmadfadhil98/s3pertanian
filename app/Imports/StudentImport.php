<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        $student = Student::updateOrCreate([
            'id' => $row['no_bp'],
            'name' => $row['nama_lengkap'],
            'nim' => $row['no_bp'],
            'beasiswa' => $row['beasiswa']
        ]);

        return $student;
    }
}
