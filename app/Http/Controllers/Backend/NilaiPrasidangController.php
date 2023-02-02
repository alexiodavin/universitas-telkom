<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Prasidang;

class NilaiPrasidangController extends Controller
{
    public function index()
    {
        $prasidang = Prasidang::whereMahasiswaId(auth()->user()->mahasiswa->id)->first();
        if ($prasidang == null) {
            return redirect()->back()->with('warning', 'Data belum tersedia');
        }
        return view('backend.nilai-prasidang.index', [
            'item' => $prasidang
        ]);
    }

    public function penguji()
    {
        return view('backend.nilai-prasidang.penguji', [
            'item' => Prasidang::whereMahasiswaId(auth()->user()->mahasiswa->id)->first(),
        ]);
    }
    public function penguji1()
    {
        return view('backend.nilai-prasidang.penguji1', [
            'item' => Prasidang::whereMahasiswaId(auth()->user()->mahasiswa->id)->first(),
        ]);
    }

    public function penguji2()
    {
        return view('backend.nilai-prasidang.penguji2', [
            'item' => Prasidang::whereMahasiswaId(auth()->user()->mahasiswa->id)->first(),
        ]);
    }

    public function print()
    {
        return view('backend.nilai-prasidang.print', [
            'item' => Prasidang::whereMahasiswaId(auth()->user()->mahasiswa->id)->first(),
        ]);
    }
}
