<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('dosen')->insert([
            [
                'user_id' => 2,
                'periode_id' => 1,
                'nama' => 'Dian Pramana',
                'nama_gelar' => 'Dian Pramana M.Kom',
                'nip' => '194707301979031001',
                'kode' => 'DP',
                'telepon' => '085737125437',
                'alamat' => 'Jl. Tukad Irawadi No.105, Sesetan, Denpasar Selatan, Kota Denpasar, Bali 80225',
                'foto' => 'user.png',
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
        ]);
    }
}