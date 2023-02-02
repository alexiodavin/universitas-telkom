<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sidang;
use App\Models\JadwalSidang;

class ViewJadwalSidangController extends Controller
{
    public function index(){

        // dd(Sidang::all());
        return view('backend.jadwal.sidang', [
            'items' => JadwalSidang::all()
        ]);
    }

    public function edit($id){
        $item = JadwalSidang::find($id);
        // dd($item);

        return view('backend.jadwal.edit-sidang', [
            'item' => JadwalSidang::find($id)
        ]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        // $sidang = Sidang::find($id);
        $jadwal_sidang = JadwalSidang::whereId($id)->first();
        if($jadwal_sidang){
            $jadwal_sidang->update($data);
        }else{
            JadwalSidang::create([
                'tanggal_sidang' => $request->tanggal_sidang,
                'jam_mulai_sidang' => $request->jam_mulai_sidang,
                'jam_selesai_sidang' => $request->jam_selesai_sidang,
                'bulan' => $request->bulan
            ]);
        }
        return redirect()->route('backend.koordinator-pa.view-jadwal-sidang')->with('success', 'Berhasil mengubah data');
    }

    public function delete($id){
        $sidang = Sidang::find($id);
        $jadwal_sidang = JadwalSidang::whereId($id)->first();
        if($jadwal_sidang){
            $jadwal_sidang->delete();
        }
        return redirect()->route('backend.koordinator-pa.view-jadwal-sidang')->with('success', 'Berhasil menghapus data');
    }
}
