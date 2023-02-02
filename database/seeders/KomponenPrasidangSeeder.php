<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KomponenPrasidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('komponen_prasidang')->insert([
            [
                'prodi_id' => 1,
                'periode_id' => 2,
                'nama_komponen' => 'Penguasaan Materi',
                'persentase' => 35,
                'keterangan' => 'Keterangan Penguasaan Materi',
                'tanggal_deadline_input_nilai' => date('Y-m-d'),
                'tahun_ajaran' => 2022,
                'semester' => 'Ganjil',
            ],
            [
                'prodi_id' => 1,
                'periode_id' => 2,
                'nama_komponen' => 'Penguasaan Aplikasi / Implementasi Produk',
                'persentase' => 35,
                'keterangan' => 'Keterangan Penguasaan Aplikasi / Implementasi Produk',
                'tanggal_deadline_input_nilai' => date('Y-m-d'),
                'tahun_ajaran' => 2022,
                'semester' => 'Ganjil',
            ],
            [
                'prodi_id' => 1,
                'periode_id' => 2,
                'nama_komponen' => 'Tata Tulis',
                'persentase' => 20,
                'keterangan' => 'Keterangan Tata Tulis',
                'tanggal_deadline_input_nilai' => date('Y-m-d'),
                'tahun_ajaran' => 2022,
                'semester' => 'Ganjil',
            ],
            [
                'prodi_id' => 1,
                'periode_id' => 2,
                'nama_komponen' => 'Teknik Presentasi',
                'persentase' => 10,
                'keterangan' => 'Keterangan Teknik Presentasi',
                'tanggal_deadline_input_nilai' => date('Y-m-d'),
                'tahun_ajaran' => 2022,
                'semester' => 'Ganjil',
            ],
        ]);
    }
}
