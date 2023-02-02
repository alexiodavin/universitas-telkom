<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('mahasiswa')->insert([
            [
                'user_id' => 3,
                'periode_id' => 1,
                'nama' => 'Agus Herianto',
                'nim' => '150030681',
                'telepon' => '085737125437',
                'alamat' => 'Jl. Tukad Irawadi No.105, Sesetan, Denpasar Selatan, Kota Denpasar, Bali 80225',
                'foto' => 'user.png',
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
        ]);
    }
}