<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'admin_manage_dosen',
            ],
            [
                'id'    => 2,
                'title' => 'admin_manage_mahasiswa',
            ],
            [
                'id'    => 3,
                'title' => 'admin_manage_staff',
            ],
            [
                'id'    => 4,
                'title' => 'admin_manage_todis',
            ],
            [
                'id'    => 5,
                'title' => 'admin_manage_prodis',
            ],
            [
                'id'    => 6,
                'title' => 'admin_manage_disertasi',
            ],
            [
                'id'    => 7,
                'title' => 'admin_manage_file',
            ],
        ];

        Permission::insert($permissions);
    }
}
