<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KomponenProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('komponen_proposal')->insert([
            [
                'prodi_id' => 1,
                'periode_id' => 2,
                'nama_komponen' => 'Latar Belakang',
                'persentase' => 20,
                'keterangan' => 'Keterangan Latar Belakang',
                'tanggal_deadline_input_nilai' => date('Y-m-d'),
                'tahun_ajaran' => 2022,
                'semester' => 'Ganjil',
            ],
            [
                'prodi_id' => 1,
                'periode_id' => 2,
                'nama_komponen' => 'Studi Pustaka',
                'persentase' => 20,
                'keterangan' => 'Keterangan Studi Pustaka',
                'tanggal_deadline_input_nilai' => date('Y-m-d'),
                'tahun_ajaran' => 2022,
                'semester' => 'Ganjil',
            ],
            [
                'prodi_id' => 1,
                'periode_id' => 2,
                'nama_komponen' => 'Perbandingan Sistem',
                'persentase' => 10,
                'keterangan' => 'Keterangan Perbandingan Sistem',
                'tanggal_deadline_input_nilai' => date('Y-m-d'),
                'tahun_ajaran' => 2022,
                'semester' => 'Ganjil',
            ],
            [
                'prodi_id' => 1,
                'periode_id' => 2,
                'nama_komponen' => 'Gambaran Proses Bisnis',
                'persentase' => 25,
                'keterangan' => 'Keterangan Gambaran Proses Bisnis',
                'tanggal_deadline_input_nilai' => date('Y-m-d'),
                'tahun_ajaran' => 2022,
                'semester' => 'Ganjil',
            ],
            [
                'prodi_id' => 1,
                'periode_id' => 2,
                'nama_komponen' => 'Lampiran Hasil Kuisioner',
                'persentase' => 25,
                'keterangan' => 'Keterangan Lampiran Hasil Kuisioner',
                'tanggal_deadline_input_nilai' => date('Y-m-d'),
                'tahun_ajaran' => 2022,
                'semester' => 'Ganjil',
            ],
        ]);
    }
}
