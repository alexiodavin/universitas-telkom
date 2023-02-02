<?php

namespace App\Imports;

use App\Models\Periode;
use App\Models\KomponenPrasidang;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportKomponenPrasidang implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row){
            if($key != 0){   
                if($row[0] != null || $row[0] != ""){
                    KomponenPrasidang::create([
                        'prodi_id' => auth()->user()->prodi_id,
                        'periode_id' => $row[0],
                        'nama_komponen' => $row[1],
                        'persentase' => $row[2],
                        'keterangan' => $row[3],
                        'tanggal_deadline_input_nilai' => KomponenPrasidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($row[0])->first()->tanggal_deadline_input_nilai ?? null,
                        'tahun_ajaran' => Periode::find($row[0])->tahun,
                        'semester' => Periode::find($row[0])->semester,
                    ]);
                }
            }
        }
    }
}
