<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Periode;

class ProdiController extends Controller
{
    public function getListPeriode()
    {
        $tahun_ajaran = [];
        $periodes = [];
        foreach (Periode::all() as $periode) {
            if (!in_array($periode->tahun_ajaran, $tahun_ajaran)) {
                $periodes[] = $periode;
                $tahun_ajaran[] = $periode->tahun_ajaran;
            }
        }
        return $periodes;
    }

    public function index()
    {
        $tahun_ajaran = [];
        $periodes = [];
        foreach (Periode::all() as $periode) {
            if (!in_array($periode->tahun_ajaran, $tahun_ajaran)) {
                $periodes[] = $periode;
                $tahun_ajaran[] = $periode->tahun_ajaran;
            }
        }
        return view('backend.prodi.index', [
            'items' => Prodi::where('tahun_ajaran', 'like', '%' . request()->periode . '%')->latest()->get(),
            'periodes' => $periodes,
        ]);
    }

    public function create()
    {
        return view('backend.prodi.create', [
            'periodes' => $this->getListPeriode(),
            'dosens' => Dosen::orderBy('nama', 'ASC')->get()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'unique:prodi',
        ]);

        if (!$periode = Periode::whereTahunAjaran("2021-2022")->whereSemester("Genap")->first()) {
            return redirect()->back()->with('warning', 'Data periode yang anda pilih belum tersedia');
        }
        $data = [
            'periode_id' => $periode->id,
            'koor_id' => $request->koor_id,
            // 'kaprodi_id' => $request->kaprodi_id,
            'kode' => $request->kode,
            'singkatan' => $request->singkatan,
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'tahun_ajaran' => "2021-2022",
            'semester' => "Genap",
        ];
        Prodi::create($data);
        return redirect()->route('backend.admin.prodi')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        return view('backend.prodi.edit', [
            'item' => Prodi::find($id),
            'prodis' => Prodi::all(),
            'periodes' => $this->getListPeriode(),
            'dosens' => Dosen::orderBy('nama', 'ASC')->get()
        ]);
    }

    public function update(Request $request, $id)
    {
        if (!$periode = Periode::whereTahunAjaran("2021-2022")->whereSemester("Genap")->first()) {
            return redirect()->back()->with('warning', 'Data periode yang anda pilih belum tersedia');
        }
        $data = [
            'periode_id' => $periode->id,
            'koor_id' => $request->koor_id,
            // 'kaprodi_id' => $request->kaprodi_id,
            'kode' => $request->kode,
            'singkatan' => $request->singkatan,
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'tahun_ajaran' => "2021-2022",
            // 'semester' => $request->semester,
        ];
        Prodi::find($id)->update($data);
        return redirect()->route('backend.admin.prodi')->with('success', 'Berhasil mengubah data');
    }

    public function delete($id)
    {
        $item = Prodi::find($id);
        $item->delete();
        return redirect()->route('backend.admin.prodi')->with('success', 'Berhasil menghapus data');
    }
}
