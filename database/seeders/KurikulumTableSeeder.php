<?php

namespace Database\Seeders;

use App\Models\Kurikulum;
use Illuminate\Database\Seeder;

class KurikulumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kurikulums = [
            [
                'id'    => 1,
                'name' => 'Imu Pertanian 2011',
            ],
            [
                'id'    => 2,
                'name' => 'Ilmu Pertanian 2017',
            ],
            [
                'id'    => 3,
                'name' => 'Ilmu Pertanian 2021',
            ],
        ];

        Kurikulum::insert($kurikulums);
    }
}
