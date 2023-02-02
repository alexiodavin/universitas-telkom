<?php

namespace App\Exports;

use App\Models\Sidang;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportSidang implements FromView
{
    public function view(): View
    {
        $sidang_data = DB::table('jadwal_sidang')
            ->join('sidang', 'jadwal_sidang.sidang_id', '=', 'sidang.id')
            ->join('mahasiswa', 'sidang.mahasiswa_id', '=', 'mahasiswa.id')
            ->select('mahasiswa.nim', 'mahasiswa.nama', 'sidang.judul_indo', 'sidang.judul_inggris', 'pembimbing1_id', 'pembimbing2_id', 'penguji1_id', 'penguji2_id', 'jadwal_sidang.tanggal_sidang', 'jadwal_sidang.jam_mulai_sidang', 'jadwal_sidang.jam_selesai_sidang' )
            ->get();

        return view('backend.exports.sidang', [
            // 'items' => Sidang::all()
            'items' => $sidang_data
        ]);
    }
}
