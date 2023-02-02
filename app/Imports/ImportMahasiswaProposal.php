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
        foreach ($rows as $key => $row){
            if($key != 0){
                if($row[0] != null || $row[0] != ""){
                    $check = Proposal::whereMahasiswaId($row[0])->wherePeriodeId($row[5])->first();
                    if($check){
                        $check->delete();
                    }
                    Proposal::create([
                        'mahasiswa_id' => Mahasiswa::whereNim($row[0])->first()->id,
                        'pembimbing1_id' => Dosen::whereKode($row[4])->first()->id,
                        'pembimbing2_id' => Dosen::whereKode($row[5])->first()->id,
                        'penguji1_id' => Dosen::whereKode($row[6])->first()->id,
                        'penguji2_id' => Dosen::whereKode($row[7])->first()->id,
                        'periode_id' => $row[8],
                        'judul_indo' => $row[2],
                        'judul_inggris' => $row[3],
                        'tahun_ajaran' => \App\Models\Periode::find($row[8])->tahun_ajaran,
                        'semester' => \App\Models\Periode::find($row[8])->semester,
                        'jumlah_penguji' => 2,
                    ]);
                }
            }
        }
    }
}
