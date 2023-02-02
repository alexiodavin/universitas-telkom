<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Periode;
use App\Models\Proposal;
use App\Models\Prasidang;
use App\Models\Sidang;

class DataMahasiswaController extends Controller
{
    public function proposal(){
        $result = [];
        foreach(Proposal::all() as $proposal){
            if(auth()->user()->prodi_id == $proposal->mahasiswa->mahasiswa_import->prodi_id){
                if($proposal->nilai_penguji1 && $proposal->nilai_penguji2){
                    $proposal['status'] = 'Sudah Proposal';
                    $result[] = $proposal;
                }else{
                    $proposal['status'] = 'Belum Proposal';
                    $result[] = $proposal;
                }
            }
        }
        return view('backend.data-mahasiswa.proposal', [
            'items' => $result,
        ]);
    }

    public function prasidang(){
        $result = [];
        foreach(Prasidang::all() as $prasidang){
            if(auth()->user()->prodi_id == $prasidang->mahasiswa->mahasiswa_import->prodi_id){
                if($prasidang->nilai_penguji1 && $prasidang->nilai_penguji2){
                    $prasidang['status'] = 'Sudah Prasidang';
                    $result[] = $prasidang;
                }else{
                    $prasidang['status'] = 'Belum Prasidang';
                    $result[] = $prasidang;
                }
            }
        }
        return view('backend.data-mahasiswa.prasidang', [
            'items' => $result,
        ]);
    }

    public function sidang(){
        $result = [];
        foreach(Sidang::all() as $sidang){
            if(auth()->user()->prodi_id == $sidang->mahasiswa->mahasiswa_import->prodi_id){
                if($sidang->nilai_penguji1 && $sidang->nilai_penguji2){
                    $sidang['status'] = 'Sudah Sidang';
                    $result[] = $sidang;
                }else{
                    $sidang['status'] = 'Belum Sidang';
                    $result[] = $sidang;
                }
            }
        }
        return view('backend.data-mahasiswa.sidang', [
            'items' => $result,
        ]);
    }

    public function lulusSidang(){
        $result = [];
        foreach(Sidang::all() as $sidang){
            if($sidang->nilai_final){
                if($sidang->nilai_final->nilai_final > 50){
                    $result[] = $sidang;
                }
            }
        }
        return view('backend.data-mahasiswa.lulus-sidang', [
            'items' => $result,
        ]);
    }
}
