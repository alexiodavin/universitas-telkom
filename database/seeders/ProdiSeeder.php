<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('prodi')->insert([
            [
                'kode' => 'D3SI',
                'singkatan' => 'D3SI',
                'nama' => 'D3 Sistem Informasi',
                'keterangan' => 'Akreditasi A',
                // 'koor_id' => 1,
                // 'kaprodi_id' => 1,
                'periode_id' => 1,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
            [
                'kode' => 'D3TE',
                'singkatan' => 'D3TE',
                'nama' => 'D3 Digital Connectivity',
                'keterangan' => 'Akreditasi Unggul',
                // 'koor_id' => 1,
                // 'kaprodi_id' => 1,
                'periode_id' => 1,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
            [
                'kode' => 'D3TI',
                'singkatan' => 'D3TI',
                'nama' => 'D3 Teknik Informatika',
                'keterangan' => 'Akreditasi Unggul',
                // 'koor_id' => 1,
                // 'kaprodi_id' => 1,
                'periode_id' => 1,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
            [
                'kode' => 'D3SIA',
                'singkatan' => 'D3SIA',
                'nama' => 'D3 Sistem Informasi Akuntansi',
                'keterangan' => 'Akreditasi A',
                // 'koor_id' => 1,
                // 'kaprodi_id' => 1,
                'periode_id' => 1,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
            [
                'kode' => 'D3TK',
                'singkatan' => 'D3TK',
                'nama' => 'D3 Teknik Komputer',
                'keterangan' => 'Akreditasi Unggul',
                // 'koor_id' => 1,
                // 'kaprodi_id' => 1,
                'periode_id' => 1,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
            [
                'kode' => 'D3DM',
                'singkatan' => 'D3DM',
                'nama' => 'D3 Digital Marketing',
                'keterangan' => 'Akreditasi B',
                // 'koor_id' => 1,
                // 'kaprodi_id' => 1,
                'periode_id' => 1,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
            [
                'kode' => 'DCA',
                'singkatan' => 'DCA',
                'nama' => 'S1 Terapan Digital Creative Multimedia',
                'keterangan' => 'Akreditasi C',
                // 'koor_id' => 1,
                // 'kaprodi_id' => 1,
                'periode_id' => 1,
                'tahun_ajaran' => '2021-2022',
                'semester' => 'Genap',
            ],
        ]);
    }
}
