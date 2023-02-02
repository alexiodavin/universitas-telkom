<?php

namespace App\Imports;

use App\Models\Dosen;
use App\Models\Periode;
use App\Models\Prasidang;
use App\Models\Sidang;
use App\Models\Mahasiswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportMahasiswaSidang implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row){
            if($key != 0){
                if($row[0] != null || $row[0] != ""){
                    $check = Sidang::whereMahasiswaId($row[0])->wherePeriodeId($row[5])->first();
                    if($check){
                        $check->delete();
                    }
                    Sidang::create([
                        'mahasiswa_id' => Mahasiswa::whereNim($row[0])->first()->id,
                        'pembimbing1_id' => Dosen::whereKode($row[4])->first()->id,
                        'pembimbing2_id' => Dosen::whereKode($row[5])->first()->id,
                        'penguji1_id' => Dosen::whereKode($row[6])->first()->id,
                        'penguji2_id' => Dosen::whereKode($row[7])->first()->id,
                        'periode_id' => $row[8],
                        'judul_indo' => Prasidang::whereMahasiswaId(Mahasiswa::whereNim($row[0])->first()->id)->first()->judul_indo,
                        'judul_inggris' => Prasidang::whereMahasiswaId(Mahasiswa::whereNim($row[0])->first()->id)->first()->judul_inggris,
                        'tahun_ajaran' => \App\Models\Periode::find($row[8])->tahun_ajaran,
                        'semester' => \App\Models\Periode::find($row[8])->semester,
                        'jumlah_penguji' => 2,
                    ]);
                }
            }
        }
    }
}
