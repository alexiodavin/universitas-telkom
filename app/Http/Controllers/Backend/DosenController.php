<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ImportDosen;
use Maatwebsite\Excel\Facades\Excel;

use Multipart;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Periode;
use App\Models\Dosen;
use App\Models\DosenImport;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
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
        return view('backend.dosen.index', [
            'periodes' => $periodes,
            // 'items' => DosenImport::where('tahun_ajaran', 'like', '%' . request()->periode . '%')->latest()->get()
            'items' => DosenImport::groupBy('prodi_id')->get()
        ]);
    }

    public function create()
    {
        return view('backend.dosen.create', [
            'prodis' => Prodi::all(),
            'periodes' => $this->getListPeriode(),
        ]);
    }

    public function store(Request $request)
    {
        if (!$periode = Periode::whereTahunAjaran("2021-2022")->whereSemester("Genap")->first()) {
            return redirect()->back()->with('warning', 'Data periode yang anda pilih belum tersedia');
        }
        $data = [
            'periode_id' => $periode->id,
            'prodi_id' => $request->prodi_id,
            'tahun_ajaran' => "2022-2021",
            'semester' => "Genap",
        ];

        DB::beginTransaction();
        try {
            DosenImport::create($data);
            Excel::import(new ImportDosen, $request->file);
            DB::commit();
            return redirect()->route('backend.admin.dosen')->with('success', 'Berhasil menambahkan data');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('warning', 'Gagal menambah data, silahkan cek kembali file anda');
        }
    }

    public function edit($id)
    {
        return view('backend.dosen.edit', [
            'item' => DosenImport::find($id),
            'prodis' => Prodi::all(),
            'periodes' => $this->getListPeriode(),
        ]);
    }

    public function update(Request $request, $id)
    {
        // if (!$periode = Periode::whereTahunAjaran($request->tahun_ajaran)->whereSemester($request->semester)->first()) {
        //     return redirect()->back()->with('warning', 'Data periode yang anda pilih belum tersedia');
        // }
        $data = [
            // 'periode_id' => $periode->id,
            'prodi_id' => $request->prodi_id,
            // 'tahun_ajaran' => $periode->tahun_ajaran,
            // 'semester' => $request->semester,
        ];
        DosenImport::find($id)->update($data);
        return redirect()->route('backend.admin.dosen')->with('success', 'Berhasil menambahkan data');
    }

    public function delete($id)
    {
        foreach (Dosen::whereDosenImportId($id)->get() as $dosen) {
            User::find($dosen->user_id)->delete();
        }
        Dosen::whereDosenImportId($id)->delete();
        DosenImport::find($id)->delete();
        return redirect()->route('backend.admin.dosen')->with('success', 'Berhasil menghapus data');
    }

    public function detail($id)
    {
        return view('backend.dosen.detail', [
            // 'item' => DosenImport::find($id),
            'item' => DosenImport::where('prodi_id', $id)->first(),
            // 'items' => Dosen::whereDosenImportId($id)->get()
            'items' => Dosen::join('dosen_import', 'dosen.dosen_import_id', '=', 'dosen_import.id')->where('dosen_import.prodi_id', $id)->get()
        ]);
    }
}
