<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CurrentSemester;
use Illuminate\Http\Request;

use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Periode;
use App\Models\DosenKoordinatorPA;

use function App\Helpers\semester;
use function App\Helpers\tahunAjaran;

class DosenKoorPAController extends Controller
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
        return view('backend.dosen-koor-pa.index', [
            'periodes' => $periodes,
            'tahun_ajaran' => tahunAjaran(),
            'semester' => semester(),
            'items' => DosenKoordinatorPA::where('tahun_ajaran', 'like', '%' . request()->periode . '%')->latest()->get()
        ]);
    }

    public function create()
    {
        return view('backend.dosen-koor-pa.create', [
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
        if (DosenKoordinatorPA::where('periode_id', $periode->id)->where('prodi_id', $request->prodi_id)->first()) {
            return redirect()->back()->with('warning', 'Posisi koordinator PA untuk periode ini sudah tersedia');
        }
        $data = [
            'dosen_id' => $request->dosen_id,
            'prodi_id' => $request->prodi_id,
            'periode_id' => $periode->id,
            'tahun_ajaran' => $request->tahun_ajaran,
            'semester' => $request->semester,
        ];
        DosenKoordinatorPA::create($data);
        return redirect()->route('backend.admin.dosen-koor-pa')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        return view('backend.dosen-koor-pa.edit', [
            'item' => DosenKoordinatorPA::find($id),
            'prodis' => Prodi::all(),
            'periodes' => $this->getListPeriode(),
            'dosens' => Dosen::orderBy('nama', 'ASC')->get()
        ]);
    }

    public function update(Request $request, $id)
    {
        if (!$periode = Periode::whereTahunAjaran($request->tahun_ajaran)->whereSemester($request->semester)->whereNull('bulan')->first()) {
            return redirect()->back()->with('warning', 'Data periode yang anda pilih belum tersedia');
        }
        $koordinator = DosenKoordinatorPA::find($id);
        if ($koordinator->tahun_ajaran != $request->tahun_ajaran || $koordinator->semester != $request->semester || $koordinator->prodi_id != $request->prodi_id) {
            if (DosenKoordinatorPA::where('periode_id', $periode->id)->where('prodi_id', $request->prodi_id)->first()) {
                return redirect()->back()->with('warning', 'Posisi koordinator PA untuk periode ini sudah tersedia');
            }
        }
        $data = [
            'dosen_id' => $request->dosen_id,
            'prodi_id' => $request->prodi_id,
            'periode_id' => $periode->id,
            'tahun_ajaran' => $request->tahun_ajaran,
            'semester' => $request->semester,
        ];
        DosenKoordinatorPA::find($id)->update($data);
        return redirect()->route('backend.admin.dosen-koor-pa')->with('success', 'Berhasil menambahkan data');
    }

    public function delete($id)
    {
        DosenKoordinatorPA::find($id)->delete();
        return redirect()->route('backend.admin.dosen-koor-pa')->with('success', 'Berhasil menghapus data');
    }
}
