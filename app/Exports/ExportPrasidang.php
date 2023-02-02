<?php

namespace App\Exports;

use App\Models\Prasidang;
use App\Models\JadwalPrasidang;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportPrasidang implements FromView
{
    public function view(): View
    {
        $prasidang_data = DB::table('jadwal_prasidang')
            ->join('prasidang', 'jadwal_prasidang.prasidang_id', '=', 'prasidang.id')
            ->join('mahasiswa', 'prasidang.mahasiswa_id', '=', 'mahasiswa.id')
            ->select('mahasiswa.nim', 'mahasiswa.nama', 'prasidang.judul_indo', 'prasidang.judul_inggris', 'pembimbing1_id', 'pembimbing2_id', 'penguji1_id', 'penguji2_id', 'jadwal_prasidang.tanggal_prasidang', 'jadwal_prasidang.jam_mulai_prasidang', 'jadwal_prasidang.jam_selesai_prasidang' )
            ->get();

        // dd($prasidang_data);
        
        return view('backend.exports.prasidang', [
            // 'items' => JadwalPrasidang::all()
            'items' => $prasidang_data
            // 'pembimbing' => DB::table('')
        ]);
    }
}
