<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Periode;
use App\Models\Sidang;

class ViewTidakLulusSidangController extends Controller
{
    public function index(){
        $result = [];
        foreach(Sidang::where('periode_id', 'like', '%' . request()->periode_id . '%')->get() as $sidang){
            if($sidang->nilai_final){
                if($sidang->nilai_final->nilai_final < 51){
                    $result[] = $sidang;
                }
            }
            // $result[] = $sidang;
        }
        return view('backend.view-tidak-lulus-sidang.index', [
            'items' => $result,
            'periodes' => Periode::all(),
        ]);
    }
}
