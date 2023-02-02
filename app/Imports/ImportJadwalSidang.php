<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use App\Models\Sidang;
use App\Models\JadwalSidang;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportJadwalSidang implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row){
            if($key != 0){
                if($row[0] != null || $row[0] != ""){
                    $sidang = Sidang::whereMahasiswaId(Mahasiswa::whereNim($row[0])->first()->id)->first();
                    if($sidang){
                        $check = JadwalSidang::whereSidangId($sidang->id)->first();
                        if($check){
                            $check->delete();
                        }
                        JadwalSidang::create([
                            'sidang_id' => $sidang->id,
                            'ruangan_id' => null,
                            'tanggal_sidang' => $row[1],
                            'jam_mulai_sidang' => $row[2],
                            'jam_selesai_sidang' => $row[3],
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
