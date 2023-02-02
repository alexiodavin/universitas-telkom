<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Prasidang;
use App\Models\JadwalPrasidang;
use App\Models\JadwalSidang;

class ViewJadwalPrasidangController extends Controller
{
    public function index(){
        return view('backend.jadwal.prasidang', [
            'items' => JadwalPrasidang::all()
        ]);
    }

    public function edit($id){
        return view('backend.jadwal.edit-prasidang', [
            'item' => JadwalPrasidang::find($id)
        ]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        // dd($data);
        // $prasidang = Prasidang::find($id);
        $jadwal_prasidang = JadwalPrasidang::whereId($id)->first();
        if($jadwal_prasidang){
            $jadwal_prasidang->update($data);
        }else{
            JadwalPrasidang::create([
                'tanggal_prasidang' => $request->tanggal_prasidang,
                'jam_mulai_prasidang' => $request->jam_mulai_prasidang,
                'jam_selesai_prasidang' => $request->jam_selesai_prasidang,
                'bulan' => $request->bulan
            ]);
        }
        return redirect()->route('backend.koordinator-pa.view-jadwal-prasidang')->with('success', 'Berhasil mengubah data');
    }

    public function delete($id){
        $prasidang = Prasidang::find($id);
        $jadwal_prasidang = JadwalPrasidang::whereId($id)->first();
        if($jadwal_prasidang){
            $jadwal_prasidang->delete();
        }
        return redirect()->route('backend.koordinator-pa.view-jadwal-prasidang')->with('success', 'Berhasil menghapus data');
    }
}
