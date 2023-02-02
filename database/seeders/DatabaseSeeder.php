<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            PeriodeSeeder::class,
            UserSeeder::class,
            AdminSeeder::class,
            // DosenSeeder::class,
            // MahasiswaSeeder::class,
            ProdiSeeder::class,
            NilaiMutuSeeder::class,
            RuanganSeeder::class,
            KomponenProposalSeeder::class,
            KomponenPrasidangSeeder::class,
            KomponenSidangSeeder::class,
        ]);
    }
}
