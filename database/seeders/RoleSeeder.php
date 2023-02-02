<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('role')->insert([
            [
                'nama' => 'Admin'
            ],
            [
                'nama' => 'Dosen'
            ],
            [
                'nama' => 'Mahasiswa'
            ],
        ]);
    }
}
