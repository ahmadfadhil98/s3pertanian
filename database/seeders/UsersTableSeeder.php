<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'username'       => 'admin',
                'email'          => 'admin@mail.com',
                'password'       => bcrypt('admin'),
                'type'           => 1,
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Lecturer',
                'username'       => 'lecturer',
                'email'          => 'lecturer@mail.com',
                'password'       => bcrypt('lecture'),
                'type'           => 2,
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'           => 'Student',
                'username'       => 'student',
                'email'          => 'student@mail.com',
                'password'       => bcrypt('student'),
                'type'           => 3,
                'remember_token' => null,
            ],
            [
                'id'             => 4,
                'name'           => 'Staff',
                'username'       => 'staff',
                'email'          => 'staff@mail.com',
                'password'       => bcrypt('staff'),
                'type'           => 4,
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
