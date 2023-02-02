<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NilaiMutuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('nilai_mutu')->insert([
            [
                'periode_id' => 1,
                'index' => 'A',
                'nilai_min' => 80,
                'nilai_maks' => 100,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
            [
                'periode_id' => 1,
                'index' => 'AB',
                'nilai_min' => 70,
                'nilai_maks' => 80,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
            [
                'periode_id' => 1,
                'index' => 'B',
                'nilai_min' => 65,
                'nilai_maks' => 70,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
            [
                'periode_id' => 1,
                'index' => 'BC',
                'nilai_min' => 60,
                'nilai_maks' => 65,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
            [
                'periode_id' => 1,
                'index' => 'C',
                'nilai_min' => 50,
                'nilai_maks' => 60,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
            [
                'periode_id' => 1,
                'index' => 'D',
                'nilai_min' => 40,
                'nilai_maks' => 50,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
            [
                'periode_id' => 1,
                'index' => 'E',
                'nilai_min' => 0,
                'nilai_maks' => 40,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
            [
                'periode_id' => 2,
                'index' => 'A',
                'nilai_min' => 80,
                'nilai_maks' => 100,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
            [
                'periode_id' => 2,
                'index' => 'AB',
                'nilai_min' => 70,
                'nilai_maks' => 80,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
            [
                'periode_id' => 2,
                'index' => 'B',
                'nilai_min' => 65,
                'nilai_maks' => 70,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
            [
                'periode_id' => 2,
                'index' => 'BC',
                'nilai_min' => 60,
                'nilai_maks' => 65,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
            [
                'periode_id' => 2,
                'index' => 'C',
                'nilai_min' => 50,
                'nilai_maks' => 60,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
            [
                'periode_id' => 2,
                'index' => 'D',
                'nilai_min' => 40,
                'nilai_maks' => 50,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
            [
                'periode_id' => 2,
                'index' => 'E',
                'nilai_min' => 0,
                'nilai_maks' => 40,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
        ]);
    }
}
