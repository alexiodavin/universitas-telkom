<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Periode;
use App\Models\Proposal;
use App\Models\Prasidang;
use App\Models\Sidang;

class ViewProgressMahasiswaController extends Controller
{
    public function index(){
        $result = [];
        if(request()->status == ''){
            foreach(Proposal::all() as $proposal){
                if($proposal->nilai_penguji1 && $proposal->nilai_penguji2){
                    $proposal['status'] = 'Sudah Proposal';
                    $result[] = $proposal;
                }else{
                    $proposal['status'] = 'Belum Proposal';
                }
            }
            foreach(Prasidang::all() as $prasidang){
                if($prasidang->nilai_penguji1 && $prasidang->nilai_penguji2){
                    $prasidang['status'] = 'Sudah Prasidang';
                    $result[] = $prasidang;
                }else{
                    $prasidang['status'] = 'Belum Prasidang';
                }
            }
            foreach(Sidang::all() as $sidang){
                if($sidang->nilai_penguji1 && $sidang->nilai_penguji2){
                    $sidang['status'] = 'Sudah Sidang';
                    $result[] = $sidang;
                }else{
                    $sidang['status'] = 'Belum Sidang';
                }
            }
        }else if(request()->status == 'belum-proposal'){
            foreach(Proposal::all() as $proposal){
                if($proposal->nilai_penguji1 && $proposal->nilai_penguji2){
                    $proposal['status'] = 'Sudah Proposal';
                }else{
                    $proposal['status'] = 'Belum Proposal';
                    $result[] = $proposal;
                }
            }
        }else if(request()->status == 'sudah-proposal'){
            foreach(Proposal::all() as $proposal){
                if($proposal->nilai_penguji1 && $proposal->nilai_penguji2){
                    $proposal['status'] = 'Sudah Proposal';
                    $result[] = $proposal;
                }else{
                    $proposal['status'] = 'Belum Proposal';
                }
            }
        }else if(request()->status == 'belum-prasidang'){
            foreach(Prasidang::all() as $prasidang){
                if($prasidang->nilai_penguji1 && $prasidang->nilai_penguji2){
                    $prasidang['status'] = 'Sudah Prasidang';
                }else{
                    $prasidang['status'] = 'Belum Prasidang';
                    $result[] = $prasidang;
                }
            }
        }else if(request()->status == 'sudah-prasidang'){
            foreach(Prasidang::all() as $prasidang){
                if($prasidang->nilai_penguji1 && $prasidang->nilai_penguji2){
                    $prasidang['status'] = 'Sudah Prasidang';
                    $result[] = $prasidang;
                }else{
                    $prasidang['status'] = 'Belum Prasidang';
                }
            }
        }else if(request()->status == 'belum-sidang'){
            foreach(Sidang::all() as $sidang){
                if($sidang->nilai_penguji1 && $sidang->nilai_penguji2){
                    $sidang['status'] = 'Sudah Sidang';
                }else{
                    $sidang['status'] = 'Belum Sidang';
                    $result[] = $sidang;
                }
            }
        }else if(request()->status == 'sudah-sidang'){
            foreach(Sidang::all() as $sidang){
                if($sidang->nilai_penguji1 && $sidang->nilai_penguji2){
                    $sidang['status'] = 'Sudah Sidang';
                    $result[] = $sidang;
                }else{
                    $sidang['status'] = 'Belum Sidang';
                }
            }
        }

        // foreach(Proposal::where('periode_id', 'like', '%' . request()->periode_id . '%')->get() as $proposal){
        //     if($proposal->nilai_penguji1 && $proposal->nilai_penguji2){
        //         $proposal['status'] = 'Sudah Proposal';
        //     }else{
        //         $proposal['status'] = 'Belum Proposal';
        //     }
        //     $result[] = $proposal;
        // }
        // foreach(Prasidang::where('periode_id', 'like', '%' . request()->periode_id . '%')->get() as $prasidang){
        //     if($prasidang->nilai_penguji1 && $prasidang->nilai_penguji2){
        //         $prasidang['status'] = 'Sudah Prasidang';
        //     }else{
        //         $prasidang['status'] = 'Belum Prasidang';
        //     }
        //     $result[] = $prasidang;
        // }
        // foreach(Sidang::where('periode_id', 'like', '%' . request()->periode_id . '%')->get() as $sidang){
        //     if($sidang->nilai_penguji1 && $sidang->nilai_penguji2){
        //         $sidang['status'] = 'Sudah Sidang';
        //     }else{
        //         $sidang['status'] = 'Belum Sidang';
        //     }
        //     $result[] = $sidang;
        // }
        return view('backend.view-progress-mahasiswa.index', [
            'items' => $result,
            'periodes' => Periode::all(),
        ]);
    }
}
