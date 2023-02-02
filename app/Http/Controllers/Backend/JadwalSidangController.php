<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sidang;

class JadwalSidangController extends Controller
{
    public function index(){
        $sidang = Sidang::whereMahasiswaId(auth()->user()->mahasiswa->id)->first();
        if($sidang == null){
            return redirect()->back()->with('warning', 'Data belum tersedia');
        }
        return view('backend.jadwal-sidang.index', [
            'item' => Sidang::whereMahasiswaId(auth()->user()->mahasiswa->id)->first()
        ]);
    }
}
