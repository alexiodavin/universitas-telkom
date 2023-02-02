<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admin')->insert([
            [
                'user_id' => 1,
                'nama' => 'Admin Kampus TU',
                'telepon' => '085737125437',
                'foto' => 'user.png'
            ],
        ]);
    }
}
