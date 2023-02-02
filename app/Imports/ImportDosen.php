<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Dosen;
use App\Models\DosenImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportDosen implements ToCollection
{
    public function collection(Collection $rows)
    {
        $dosen_import = DosenImport::latest()->first();

        foreach ($rows as $key => $row){
            if($key != 0){
                if($row[0] != null || $row[0] != ""){
                    $user = User::create([
                        'role_id' => IS_DOSEN,
                        'prodi_id' => $dosen_import->prodi_id,
                        'username' => $row[0],
                        'email' => $row[1],
                        'password' => bcrypt($row[2]),
                    ]);
        
                    Dosen::create([
                        'user_id' => $user->id,
                        'periode_id' => $dosen_import->periode_id,
                        'dosen_import_id' => $dosen_import->id,
                        'nama' => $row[3],
                        'nama_gelar' => $row[4],
                        'nip' => $row[5],
                        'kode' => $row[6],
                        'telepon' => $row[7],
                        'alamat' => $row[8],
                        'foto' => 'user.png',
                        'tahun_ajaran' => $dosen_import->tahun_ajaran,
                        'semester' => $dosen_import->semester,
                    ]);
                }
            }
        }
    }
}
