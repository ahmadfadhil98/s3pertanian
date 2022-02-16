<?php

namespace App\Imports;

use App\Models\ProsesDisertasi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProsesImport implements ToModel,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $proses = ProsesDisertasi::updateOrCreate([
            'kode' => $row['kode'],
            'name' => $row['nama'],
        ]);

        return $proses;
    }
}
