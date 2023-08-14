<?php

namespace App\Imports;

use App\Models\Dosen;
use App\Models\Periode;
use App\Models\Proposal;
use App\Models\Mahasiswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


class ImportMahasiswaProposal implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if ($key != 0) {
                if ($row[0] != null || $row[0] != "") {
                    $check = Proposal::whereMahasiswaId($row[0])->first();
                    if ($check) {
                        $check->delete();
                    }
                    
                    $mahasiswa = Mahasiswa::whereNim($row[0])->firstOrFail();
                    $pembimbing1 = Dosen::whereKode($row[4])->firstOrFail();
                    $pembimbing2 = Dosen::whereKode($row[5])->firstOrFail();
                    $penguji1 = Dosen::whereKode($row[6])->firstOrFail();
                    $penguji2 = Dosen::whereKode($row[7])->firstOrFail();
                    $periode = \App\Models\Periode::findOrFail($row[8]);
    
                    Proposal::create([
                        'mahasiswa_id' => $mahasiswa->id,
                        'pembimbing1_id' => $pembimbing1->id,
                        'pembimbing2_id' => $pembimbing2->id,
                        'penguji1_id' => $penguji1->id,
                        'penguji2_id' => $penguji2->id,
                        'periode_id' => $periode->id,
                        'judul_indo' => $row[2],
                        'judul_inggris' => $row[3],
                        'tahun_ajaran' => $periode->tahun_ajaran,
                        'semester' => $periode->semester,
                        'jumlah_penguji' => 2,
                    ]);
                }
            }
        }
    }
    
}
