<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('ruangan')->insert([
            [
                'kode' => 'R1',
                'nama' => 'Ruangan 1',
                'keterangan' => 'Keterangan Ruangan 1',
            ],
            [
                'kode' => 'R2',
                'nama' => 'Ruangan 2',
                'keterangan' => 'Keterangan Ruangan 2',
            ],
            [
                'kode' => 'R3',
                'nama' => 'Ruangan 3',
                'keterangan' => 'Keterangan Ruangan 3',
            ],
        ]);
    }
}
