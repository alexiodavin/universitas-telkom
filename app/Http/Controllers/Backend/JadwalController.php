<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Prasidang;
use App\Models\JadwalPrasidang;
use App\Models\JadwalSidang;
use App\Models\Sidang;

class JadwalController extends Controller
{
    public function prasidang(){
        $items = JadwalPrasidang::orderBy('id', 'DESC')->get();
        foreach($items as $item){
            $item['prasidang'] = Prasidang::find($item->prasidang_id);
        }
        
        return view('backend.upload-daftar-mahasiswa.prasidang', [
            'items' => Prasidang::all()
        ]);
    }

    public function deletePrasidang($id){
        JadwalPrasidang::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }

    public function sidang(){
        $items = JadwalSidang::orderBy('id', 'DESC')->get();
        foreach($items as $item){
            $item['sidang'] = Sidang::find($item->sidang_id);
        }
        // return view('backend.jadwal.sidang', [
        //     'items' => $items
        // ]);
        return view('backend.upload-daftar-mahasiswa.sidang', [
            'items' => Sidang::all()
        ]);
    }

    public function deleteSidang($id){
        JadwalSidang::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
