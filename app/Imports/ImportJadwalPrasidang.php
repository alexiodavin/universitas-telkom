<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use App\Models\Prasidang;
use App\Models\JadwalPrasidang;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportJadwalPrasidang implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row){
            if($key != 0){
                if($row[0] != null || $row[0] != ""){
                    $prasidang = Prasidang::whereMahasiswaId(Mahasiswa::whereNim($row[0])->first()->id)->first();
                    if($prasidang){
                        $check = JadwalPrasidang::wherePrasidangId($prasidang->id)->first();
                        if($check){
                            $check->delete();
                        }
                        JadwalPrasidang::create([
                            'prasidang_id' => $prasidang->id,
                            'ruangan_id' => null,
                            'tanggal_prasidang' => $row[1],
                            'jam_mulai_prasidang' => $row[2],
                            'jam_selesai_prasidang' => $row[3],
                            'ruangan' => null,
                        ]);
                    }else{
                        return false;
                    }
                }
            }
        }
    }
}
