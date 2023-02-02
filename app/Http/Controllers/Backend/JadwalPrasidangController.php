<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Prasidang;

class JadwalPrasidangController extends Controller
{
    public function index(){
        $prasidang = Prasidang::whereMahasiswaId(auth()->user()->mahasiswa->id)->first();
        if($prasidang == null){
            return redirect()->back()->with('warning', 'Data belum tersedia');
        }
        return view('backend.jadwal-prasidang.index', [
            'item' => Prasidang::whereMahasiswaId(auth()->user()->mahasiswa->id)->first()
        ]);
    }
}
