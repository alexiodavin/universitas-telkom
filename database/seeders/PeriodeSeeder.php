<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('periode')->insert([
            [
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
                'bulan' => 'Juni',
                'tahun' => '2022',
            ],
        ]);
        \DB::table('periode')->insert([
            [
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Ganjil',
                'bulan' => 'Desember',
                'tahun' => '2022',
            ],
        ]);
    }
}
