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
                'title' => 'admin_manage',
            ],
            [
                'id'    => 2,
                'title' => 'lecturer_manage_bimbingan',
            ],
            [
                'id'    => 3,
                'title' => 'student_manage_disertasi',
            ],
            [
                'id'    => 4,
                'title' => 'admin_manage_file',
            ],
            [
                'id'    => 5,
                'title' => 'student_manage_file',
            ],
        ];

        Permission::insert($permissions);
    }
}
