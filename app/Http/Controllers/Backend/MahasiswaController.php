<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ImportMahasiswa;
use App\Models\CurrentSemester;
use Maatwebsite\Excel\Facades\Excel;


use Multipart;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Periode;
use App\Models\Mahasiswa;
use App\Models\MahasiswaImport;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
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
        return view('backend.mahasiswa.index', [
            'periodes' => $periodes,
            'items' => MahasiswaImport::where('tahun_ajaran', 'like', '%' . request()->periode . '%')->latest()->get()
        ]);
    }

    public function create()
    {
        return view('backend.mahasiswa.create', [
            'prodis' => Prodi::all(),
            'current_semester' => CurrentSemester::find(1),
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
            'tahun_ajaran' => "$request->tahun_ajaran",
            'semester' => $request->semester,
        ];

        DB::beginTransaction();
        try {
            MahasiswaImport::create($data);
            Excel::import(new ImportMahasiswa, $request->file);
            DB::commit();
            return redirect()->route('backend.admin.mahasiswa')->with('success', 'Berhasil menambahkan data');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('warning', 'Gagal menambah data, silahkan cek kembali file anda');
        }
    }

    public function edit($id)
    {
        return view('backend.mahasiswa.edit', [
            'item' => MahasiswaImport::find($id),
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
        MahasiswaImport::find($id)->update($data);
        return redirect()->route('backend.admin.mahasiswa')->with('success', 'Berhasil menambahkan data');
    }

    public function delete($id)
    {
        foreach (Mahasiswa::whereMahasiswaImportId($id)->get() as $mahasiswa) {
            User::find($mahasiswa->user_id)->delete();
        }
        Mahasiswa::whereMahasiswaImportId($id)->delete();
        MahasiswaImport::find($id)->delete();
        return redirect()->route('backend.admin.mahasiswa')->with('success', 'Berhasil menghapus data');
    }

    public function detail($id)
    {
        return view('backend.mahasiswa.detail', [
            'item' => MahasiswaImport::find($id),
            'items' => Mahasiswa::whereMahasiswaImportId($id)->get()
        ]);
    }
}
