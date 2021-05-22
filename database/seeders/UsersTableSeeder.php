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
                'email'          => 'admin@mail.com',
                'password'       => bcrypt('password'),
                'type'           => 1,
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Lecturer',
                'email'          => 'lecturer@mail.com',
                'password'       => bcrypt('password'),
                'type'           => 2,
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'           => 'Student',
                'email'          => 'student@mail.com',
                'password'       => bcrypt('password'),
                'type'           => 3,
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
