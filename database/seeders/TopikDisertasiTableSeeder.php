<?php

namespace Database\Seeders;

use App\Models\DisertasiTopic;
use Illuminate\Database\Seeder;

class TopikDisertasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topics = [
            [
                'id'             => 1,
                'name'           => 'Agribisnis',
            ],
            [
                'id'             => 2,
                'name'           => 'Agroekoteknologi',
            ],
            [
                'id'             => 3,
                'name'           => 'Ilmu Tanah',
            ],
            [
                'id'             => 4,
                'name'           => 'Proteksi Tanaman',
            ],
            [
                'id'             => 5,
                'name'           => 'Penyuluhan Pertanian',
            ],
            [
                'id'             => 6,
                'name'           => 'Agronomi',
            ],
            [
                'id'             => 7,
                'name'           => 'Ekonomi Pertanian',
            ],
        ];

        DisertasiTopic::insert($topics);
    }
}
