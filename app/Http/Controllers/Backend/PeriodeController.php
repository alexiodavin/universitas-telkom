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
            'items' => Periode::orderBy('id', 'DESC')->get(),
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
        $data = $request->all();
        Periode::create($data);
        return redirect()->route('backend.admin.periode')->with('success', 'Berhasil menambahkan data');
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
        $item = Periode::find($id);
        $data = $request->all();
        Periode::find($id)->update($data);
        return redirect()->route('backend.admin.periode')->with('success', 'Berhasil mengubah data');
    }

    public function delete($id)
    {
        $item = Periode::find($id);
        $item->delete();
        return redirect()->route('backend.admin.periode')->with('success', 'Berhasil menghapus data');
    }
}
