<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Admin',
            ],
            [
                'id'    => 2,
                'title' => 'Lecturer',
            ],
            [
                'id'    => 3,
                'title' => 'Student',
            ],
            [
                'id'    => 4,
                'title' => 'Staff',
            ],
        ];

        Role::insert($roles);
    }
}
