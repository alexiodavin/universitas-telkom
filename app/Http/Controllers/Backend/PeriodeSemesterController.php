<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Helpers\TelkomHelper;
use Illuminate\Http\Request;

use App\Models\Periode;

use function App\Helpers\listBulan;

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
        $check = Periode::where('tahun_ajaran', $request->tahun_ajaran)
            ->where('semester', $request->semester)
            ->whereNull('bulan')->first();
        if (!$check) {
            $data = $request->all();
            Periode::create($data);
            return redirect()->route('backend.admin.periode-semester')->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->route('backend.admin.periode-semester')->with('failed', 'Periode sudah tersedia');
        }
    }

    public function edit($id)
    {
        return view('backend.periode-semester.edit', [
            'item' => Periode::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $check = Periode::where('tahun_ajaran', $request->tahun_ajaran)
            ->where('semester', $request->semester)
            ->whereNull('bulan')->first();
        $item = Periode::find($id);
        if ($request->tahun_ajaran == $item->tahun_ajaran && $request->semester == $item->semester) {
            $data = $request->all();
            Periode::find($id)->update($data);
            return redirect()->route('backend.admin.periode-semester')->with('success', 'Berhasil mengubah data');
        } elseif (!$check) {
            $data = $request->all();
            Periode::find($id)->update($data);
            return redirect()->route('backend.admin.periode-semester')->with('success', 'Berhasil mengubah data');
        } else {
            return redirect()->route('backend.admin.periode-semester')->with('failed', 'Periode sudah tersedia');
        }
    }

    public function delete($id)
    {
        $item = Periode::find($id);
        $item->delete();
        return redirect()->route('backend.admin.periode-semester')->with('success', 'Berhasil menghapus data');
    }
}
