<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Seeder;

class FileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files = [
            [
                'id'    => 1,
                'name'  => 'Blangko Kolokium',
                'file'  => 'Blangko Kolokium.pdf',
                'path'  => 'files/XAzDFQvBvlNW2OTpDmSWqoJaGjjNXIUqUixXpzQd.pdf',
            ],
            [
                'id'    => 2,
                'name'  => 'Blangko Prelim',
                'file'  => 'Blangko Prelim.pdf',
                'path'  => 'files/ch5vJtJseylzyec5E19pXDo7IUfbBBiOIqNLORdc.pdf',
            ],
            [
                'id'    => 3,
                'name'  => 'Blangko Seminar Hasil',
                'file'  => 'Blangko Seminar Hasil.pdf',
                'path'  => 'files/g6ROGCP3lyr5Lljf9ZPVnEYe2zieZdLfS6kN7Sq8.pdf',
            ],
            [
                'id'    => 4,
                'name'  => 'Blangko Ujian Verifikasi',
                'file'  => 'Blangko Ujian Verifikasi.pdf',
                'path'  => 'files/6xWijktgvzKickATpFUapVDh2quPm4aOFmSec160.pdf',
            ],
            [
                'id'    => 5,
                'name'  => 'Blangko Izin Penelitian',
                'file'  => 'Blangko Izin Penelitian.pdf',
                'path'  => 'files/I1MHEe8LQ3FBWRGfBvtOxyZKS18XLrDol3IW6Srb.pdf',
            ],
            [
                'id'    => 6,
                'name'  => 'Blangko Izin Pra Penelitian',
                'file'  => 'Blangko Izin Pra Penelitian.pdf',
                'path'  => 'files/DxKiA2rE1stkiTVzRnTvU8NvhY9Tk9FEj1kvFT2T.pdf',
            ],
            [
                'id'    => 7,
                'name'  => 'Blangko Surat Keterangan Aktif',
                'file'  => 'Blangko Surat Keterangan Aktif.pdf',
                'path'  => 'files/GwAB0QnamTWCMaZ8EOt2gQZtsh1EuSJnoabidMkx.pdf',
            ],
            [
                'id'    => 8,
                'name'  => 'Scan Bahan Ujian Tertutup 2021',
                'file'  => 'Scan Bahan Ujian Tertutup 2021.pdf',
                'path'  => 'files/zqInKiYYXXWTJKuOBS1FsWAdnoo4YhArAz1RqQPF.pdf',
            ],
            [
                'id'    => 9,
                'name'  => 'Scan Formulir Minat Penelitian dan Usulan Komisi Pembimbing',
                'file'  => 'Scan Formulir Minat Penelitian dan Usulan Komisi Pembimbing.pdf',
                'path'  => 'files/0AJ4OD8SUBBMgXiqbfnRb66Tl4FV6VPZPqeaIO2G.pdf',
            ],
            [
                'id'    => 10,
                'name'  => 'Scan Kesediaan Penguji Eksternal',
                'file'  => 'Scan Kesediaan Penguji Eksternal.pdf',
                'path'  => 'files/ruz7L2bxM4lGIMala6Sa7pYD4773hEkrEnNiAfox.pdf',
            ],
            [
                'id'    => 11,
                'name'  => 'Scan Undangan Sidang Komisi',
                'file'  => 'Scan Undangan Sidang Komisi.pdf',
                'path'  => 'files/nvkN6GYdICFT4nzMLCfmYIhkgQf7INlo7BXhQIQw.pdf',
            ],

        ];

        File::insert($files);
    }
}
