<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Periode;
use App\Models\NilaiMutu;

use function App\Helpers\periode;
use function App\Helpers\periode_tahun;
use function App\Helpers\semester;
use function App\Helpers\tahunAjaran;

class NilaiMutuController extends Controller
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
        $tahun_ajaran = tahunAjaran();
        $semester = semester();
        if (request()->tahun_ajaran) {
            $tahun_ajaran = request()->tahun_ajaran;
        }
        if (request()->semester) {
            $semester = request()->semester;
        }
        return view('backend.nilai-mutu.index', [
            'items' => NilaiMutu::where('tahun_ajaran', 'like', '%' . $tahun_ajaran . '%')
                ->where('semester', 'like', '%' . $semester . '%')
                ->latest()->get(),
            'tahun_ajaran' => $tahun_ajaran,
            'semester' => $semester,
            'periodes' => periode_tahun(),
        ]);
    }

    public function create()
    {
        return view('backend.nilai-mutu.create', [
            'periodes' => $this->getListPeriode(),
        ]);
    }

    public function store(Request $request)
    {
        // if (!$periode = Periode::whereTahunAjaran($request->tahun_ajaran)->whereSemester($request->semester)->first()) {
        //     return redirect()->back()->with('warning', 'Data periode yang anda pilih belum tersedia');
        // }
        if (!$periode = Periode::whereTahunAjaran($request->tahun_ajaran)->whereSemester($request->semester)->whereNull('bulan')->first()) {
            return redirect()->back()->with('warning', 'Data periode yang anda pilih belum tersedia');
        }
        if (NilaiMutu::where('periode_id', $periode->id)->where('index', $request->index)->first()) {
            return redirect()->back()->with('warning', "Nilai dengan index $request->index pada periode ini sudah tersedia");
        }
        $data = [
            'periode_id' => $periode->id,
            'index' => $request->index,
            'nilai_min' => $request->nilai_min,
            'nilai_maks' => $request->nilai_maks,
            'tahun_ajaran' => $request->tahun_ajaran,
            'semester' => $request->semester,
        ];
        NilaiMutu::create($data);
        return redirect()->route('backend.admin.nilai-mutu')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        return view('backend.nilai-mutu.edit', [
            'item' => NilaiMutu::find($id),
            'periodes' => $this->getListPeriode(),
        ]);
    }

    public function update(Request $request, $id)
    {

        if (!$periode = Periode::whereTahunAjaran($request->tahun_ajaran)->whereSemester($request->semester)->whereNull('bulan')->first()) {
            return redirect()->back()->with('warning', 'Data periode yang anda pilih belum tersedia');
        }
        $nilai_mutu = NilaiMutu::find($id);
        if ($nilai_mutu->tahun_ajaran != $request->tahun_ajaran || $nilai_mutu->semester != $request->semester || $nilai_mutu->prodi_id != $request->prodi_id) {
            if (NilaiMutu::where('periode_id', $periode->id)->where('index', $request->index)->first()) {
                return redirect()->back()->with('warning', 'Nilai dengan index $request->index pada periode ini sudah tersedia');
            }
        }
        $data = [
            'periode_id' => $periode->id,
            'index' => $request->index,
            'nilai_min' => $request->nilai_min,
            'nilai_maks' => $request->nilai_maks,
            'tahun_ajaran' => $request->tahun_ajaran,
            'semester' => $request->semester,
        ];
        NilaiMutu::find($id)->update($data);
        return redirect()->route('backend.admin.nilai-mutu')->with('success', 'Berhasil mengubah data');
    }

    public function delete($id)
    {
        $item = NilaiMutu::find($id);
        $item->delete();
        return redirect()->route('backend.admin.nilai-mutu')->with('success', 'Berhasil menghapus data');
    }
}
