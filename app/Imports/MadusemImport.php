<?php

namespace App\Imports;

use App\Models\Madusem;
use App\Models\Mahasiswa;
use App\Models\KomponenMadusem;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB; // Import the DB facade

class MadusemImport implements ToModel, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
// dd($row);
        // Cari Mahasiswa berdasarkan nim
        $mahasiswa = Mahasiswa::where('nim', $row['nama_mahasiswa'])->first();

        // Jika Mahasiswa dengan nim yang diberikan tidak ditemukan, cari berdasarkan nama
        if (!$mahasiswa) {
            $mahasiswa = Mahasiswa::where('nama', $row['nama_mahasiswa'])->first();
        }

        // Jika Mahasiswa tidak ditemukan berdasarkan nim maupun nama, buat baru
        if (!$mahasiswa) {
            // Buat Mahasiswa baru
            $mahasiswa = Mahasiswa::firstOrCreate(
                ['nim' => $row['nim']], // Cari atau buat mahasiswa berdasarkan nim
                ['nama' => $row['nama_mahasiswa']] // Data tambahan yang ingin disimpan
            );
        }

        // Buat Madusem baru dengan mahasiswa_id yang sudah ada atau baru dibuat
        $madusem = Madusem::firstOrCreate(['mahasiswa_id' => $mahasiswa->id]);

        // Simpan Madusem ke database
        $madusem->update([
            'pbb_1_id' => $row['pbb_1_id'],
            'pbb_2_id' => $row['pbb_2_id'],
            // Tambahkan kolom lain berdasarkan kolom Excel dan tabel database Anda
        ]);
    

        $komponenMadusemIds = [];
        $komponenMadusemData = KomponenMadusem::all();
    
        // Loop through the komponen and store the values in the pivot table
        foreach ($komponenMadusemData as $komponen) {
            // Pastikan nilai komponen tersedia dalam data baris
            if (isset($row[$komponen->slug])) {
                // Attach komponen ke Madusem
                $madusem->komponenMadusem()->attach($komponen->id, [
                    'nilai_komponen' => $row[$komponen->slug]
                ]);
    
                // Retrieve the komponen_madusem_id from the pivot values and store it in the array
                $pivot = $madusem->komponenMadusem()->find($komponen->id)->pivot;
                $komponenMadusemIds[$komponen->id] = $pivot->id;
            }
        }
        // dd($pivot);
    
        // Return the madusem and the komponen_madusem_ids
        return [
            'madusem' => $madusem,
            'komponen_madusem_ids' => $komponenMadusemIds
        ];
    }
}
