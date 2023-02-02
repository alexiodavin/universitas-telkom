<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            [
                'role_id' => IS_ADMIN,
                'prodi_id' => null,
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('asdasd'),
            ],
            // [
            //     'role_id' => IS_DOSEN,
            //     'prodi_id' => null,
            //     'username' => 'dianpramana',
            //     'email' => 'dianpramana@gmail.com',
            //     'password' => bcrypt('asdasd'),
            // ],
            // [
            //     'role_id' => IS_MAHASISWA,
            //     'prodi_id' => null,
            //     'username' => 'agusherianto',
            //     'email' => 'agusherianto@gmail.com',
            //     'password' => bcrypt('asdasd'),
            // ],
        ]);
    }
}