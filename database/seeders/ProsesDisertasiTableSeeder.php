<?php

namespace Database\Seeders;

use App\Models\ProsesDisertasi;
use Illuminate\Database\Seeder;

class ProsesDisertasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prodis = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'username'       => 'admin',
                'email'          => 'admin@mail.com',
                'password'       => bcrypt('password'),
                'type'           => 1,
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Lecturer',
                'username'       => 'lecturer',
                'email'          => 'lecturer@mail.com',
                'password'       => bcrypt('password'),
                'type'           => 2,
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'           => 'Student',
                'username'       => 'student',
                'email'          => 'student@mail.com',
                'password'       => bcrypt('password'),
                'type'           => 3,
                'remember_token' => null,
            ],
            [
                'id'             => 4,
                'name'           => 'Staff',
                'username'       => 'staff',
                'email'          => 'staff@mail.com',
                'password'       => bcrypt('password'),
                'type'           => 4,
                'remember_token' => null,
            ],
        ];

        ProsesDisertasi::insert($prodis);
        //https://www.youtube.com/watch?v=CTZw6cAyLFE
    }
}
