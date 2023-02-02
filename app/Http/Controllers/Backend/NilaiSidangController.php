<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sidang;

class NilaiSidangController extends Controller
{
    public function index()
    {
        $sidang = Sidang::whereMahasiswaId(auth()->user()->mahasiswa->id)->first();
        if ($sidang == null) {
            return redirect()->back()->with('warning', 'Data belum tersedia');
        }
        return view('backend.nilai-sidang.index', [
            'item' => $sidang
        ]);
    }

    public function penguji()
    {
        return view('backend.nilai-sidang.penguji', [
            'item' => Sidang::whereMahasiswaId(auth()->user()->mahasiswa->id)->first(),
        ]);
    }
    public function penguji1()
    {
        return view('backend.nilai-sidang.penguji1', [
            'item' => Sidang::whereMahasiswaId(auth()->user()->mahasiswa->id)->first(),
        ]);
    }

    public function penguji2()
    {
        return view('backend.nilai-sidang.penguji2', [
            'item' => Sidang::whereMahasiswaId(auth()->user()->mahasiswa->id)->first(),
        ]);
    }
}
