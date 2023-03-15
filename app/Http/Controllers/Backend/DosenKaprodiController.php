<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Periode;
use App\Models\DosenKaprodi;

class DosenKaprodiController extends Controller
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
        return view('backend.dosen-kaprodi.index', [
            'periodes' => $periodes,
            'items' => DosenKaprodi::where('tahun_ajaran', 'like', '%' . request()->periode . '%')->latest()->get()
        ]);
    }

    public function create()
    {
        return view('backend.dosen-kaprodi.create', [
            'prodis' => Prodi::all(),
            'periodes' => $this->getListPeriode(),
            'dosens' => Dosen::orderBy('nama', 'ASC')->get()
        ]);
    }

    public function store(Request $request)
    {
        if (!$periode = Periode::whereTahunAjaran($request->tahun_ajaran)->whereSemester($request->semester)->whereNull('bulan')->first()) {
            return redirect()->back()->with('warning', 'Data periode yang anda pilih belum tersedia');
        }
        if (DosenKaprodi::where('periode_id', $periode->id)->where('prodi_id', $request->prodi_id)->first()) {
            return redirect()->back()->with('warning', 'Posisi Kaprodi untuk periode ini sudah tersedia');
        }
        $data = [
            'dosen_id' => $request->dosen_id,
            'prodi_id' => $request->prodi_id,
            'periode_id' => $periode->id,
            'tahun_ajaran' => $request->tahun_ajaran,
            'semester' => $request->semester,
            'awal_menjabat' => $request->awal_menjabat,
            'akhir_menjabat' => $request->akhir_menjabat,
        ];
        DosenKaprodi::create($data);
        return redirect()->route('backend.admin.dosen-kaprodi')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        return view('backend.dosen-kaprodi.edit', [
            'item' => DosenKaprodi::find($id),
            'prodis' => Prodi::all(),
            'periodes' => $this->getListPeriode(),
            'dosens' => Dosen::orderBy('nama', 'ASC')->get()
        ]);
    }

    public function update(Request $request, $id)
    {
        // if (!$periode = Periode::whereTahunAjaran($request->tahun_ajaran)->whereSemester($request->semester)->first()) {
        //     return redirect()->back()->with('warning', 'Data periode yang anda pilih belum tersedia');
        // }
        if (!$periode = Periode::whereTahunAjaran($request->tahun_ajaran)->whereSemester($request->semester)->whereNull('bulan')->first()) {
            return redirect()->back()->with('warning', 'Data periode yang anda pilih belum tersedia');
        }
        $kaprodi = DosenKaprodi::find($id);
        if ($kaprodi->tahun_ajaran != $request->tahun_ajaran || $kaprodi->semester != $request->semester || $kaprodi->prodi_id != $request->prodi_id) {
            if (DosenKaprodi::where('periode_id', $periode->id)->where('prodi_id', $request->prodi_id)->first()) {
                return redirect()->back()->with('warning', 'Posisi kaprodi untuk periode ini sudah tersedia');
            }
        }
        $data = [
            'dosen_id' => $request->dosen_id,
            'prodi_id' => $request->prodi_id,
            // 'periode_id' => $periode->id,
            // 'tahun_ajaran' => $request->tahun_ajaran,
            // 'semester' => $request->semester,
            'awal_menjabat' => $request->awal_menjabat,
            'akhir_menjabat' => $request->akhir_menjabat,
        ];
        DosenKaprodi::find($id)->update($data);
        return redirect()->route('backend.admin.dosen-kaprodi')->with('success', 'Berhasil menambahkan data');
    }

    public function delete($id)
    {
        DosenKaprodi::find($id)->delete();
        return redirect()->route('backend.admin.dosen-kaprodi')->with('success', 'Berhasil menghapus data');
    }
}
