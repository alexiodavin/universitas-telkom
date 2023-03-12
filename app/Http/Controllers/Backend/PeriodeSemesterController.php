<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Helpers\TelkomHelper;
use Illuminate\Http\Request;

use App\Models\Periode;

class PeriodeSemesterController extends Controller
{
    public function index()
    {
        return view('backend.periode-semester.index', [
            'items' => Periode::orderBy('id', 'DESC')->where('bulan', null)->get(),
        ]);
    }

    public function create()
    {
        return view('backend.periode-semester.create', [
            'bulan' => listBulan()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Periode::create($data);
        return redirect()->route('backend.admin.periode-semester')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        return view('backend.periode-semester.edit', [
            'item' => Periode::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = Periode::find($id);
        $data = $request->all();
        Periode::find($id)->update($data);
        return redirect()->route('backend.admin.periode-semester')->with('success', 'Berhasil mengubah data');
    }

    public function delete($id)
    {
        $item = Periode::find($id);
        $item->delete();
        return redirect()->route('backend.admin.periode-semester')->with('success', 'Berhasil menghapus data');
    }
}
