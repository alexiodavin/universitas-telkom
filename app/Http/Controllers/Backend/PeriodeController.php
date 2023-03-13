<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Helpers\TelkomHelper;
use Illuminate\Http\Request;

use App\Models\Periode;

class PeriodeController extends Controller
{
    public function index()
    {
        return view('backend.periode.index', [
            'items' => Periode::orderBy('id', 'DESC')->where('bulan', '!=', null)->get(),
        ]);
    }

    public function create()
    {
        return view('backend.periode.create', [
            'bulan' => listBulan()
        ]);
    }

    public function store(Request $request)
    {
        $check = Periode::where('tahun_ajaran', $request->tahun_ajaran)
            ->where('semester', $request->semester)
            ->where('bulan', $request->bulan)->first();
        if (!$check) {
            $data = $request->all();
            Periode::create($data);
            return redirect()->route('backend.admin.periode')->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->route('backend.admin.periode')->with('failed', 'Periode sudah tersedia');
        }
    }

    public function edit($id)
    {
        return view('backend.periode.edit', [
            'item' => Periode::find($id),
            'bulan' => listBulan()
        ]);
    }

    public function update(Request $request, $id)
    {
        $check = Periode::where('tahun_ajaran', $request->tahun_ajaran)
            ->where('semester', $request->semester)
            ->where('bulan', $request->bulan)->first();
        $item = Periode::find($id);
        if ($request->tahun_ajaran == $item->tahun_ajaran && $request->semester == $item->semester && $request->bulan == $item->bulan) {
            $data = $request->all();
            Periode::find($id)->update($data);
            return redirect()->route('backend.admin.periode')->with('success', 'Berhasil mengubah data');
        } elseif (!$check) {
            $data = $request->all();
            Periode::find($id)->update($data);
            return redirect()->route('backend.admin.periode')->with('success', 'Berhasil mengubah data');
        } else {
            return redirect()->route('backend.admin.periode')->with('failed', 'Periode sudah tersedia');
        }
    }

    public function delete($id)
    {
        $item = Periode::find($id);
        $item->delete();
        return redirect()->route('backend.admin.periode')->with('success', 'Berhasil menghapus data');
    }
}
