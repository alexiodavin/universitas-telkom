<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KomponenSidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('komponen_sidang')->insert([
            [
                'prodi_id' => 1,
                'periode_id' => 2,
                'nama_komponen' => 'Nilai Pembimbing 1',
                'persentase' => 24,
                'keterangan' => 'Keterangan Nilai Pembimbing 1',
                'tanggal_deadline_input_nilai' => date('Y-m-d'),
                'tahun_ajaran' => 2022,
                'semester' => 'Ganjil',
            ],
            [
                'prodi_id' => 1,
                'periode_id' => 2,
                'nama_komponen' => 'Nilai Pembimbing 2',
                'persentase' => 24,
                'keterangan' => 'Keterangan Nilai Pembimbing 2',
                'tanggal_deadline_input_nilai' => date('Y-m-d'),
                'tahun_ajaran' => 2022,
                'semester' => 'Ganjil',
            ],
            [
                'prodi_id' => 1,
                'periode_id' => 2,
                'nama_komponen' => 'Nilai Penguji 1',
                'persentase' => 16,
                'keterangan' => 'Keterangan Nilai Penguji 1',
                'tanggal_deadline_input_nilai' => date('Y-m-d'),
                'tahun_ajaran' => 2022,
                'semester' => 'Ganjil',
            ],
            [
                'prodi_id' => 1,
                'periode_id' => 2,
                'nama_komponen' => 'Nilai Penguji 2',
                'persentase' => 16,
                'keterangan' => 'Keterangan Nilai Penguji 2',
                'tanggal_deadline_input_nilai' => date('Y-m-d'),
                'tahun_ajaran' => 2022,
                'semester' => 'Ganjil',
            ],
            [
                'prodi_id' => 1,
                'periode_id' => 2,
                'nama_komponen' => 'Nilai Proposal',
                'persentase' => 20,
                'keterangan' => 'Keterangan Nilai Proposal',
                'tanggal_deadline_input_nilai' => date('Y-m-d'),
                'tahun_ajaran' => 2022,
                'semester' => 'Ganjil',
            ],
        ]);
    }
}
