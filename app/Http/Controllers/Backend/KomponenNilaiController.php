<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ImportKomponenProposal;
use App\Imports\ImportKomponenPrasidang;
use App\Imports\ImportKomponenSidang;
use App\Models\DeadlinePrasidang;
use App\Models\DeadlineProposal;
use App\Models\DeadlineSidang;
use App\Models\DosenKoordinatorPA;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\DB;
use App\Models\Periode;
use App\Models\Proposal;
use App\Models\Sidang;
use App\Models\KomponenProposal;
use App\Models\KomponenPrasidang;
use App\Models\KomponenSidang;

class KomponenNilaiController extends Controller
{
    ########## PROPOSAL ##########

    public function proposal($periode_id = null)
    {
        if ($periode_id == null) {
            $periode_id = DosenKoordinatorPA::whereDosenId(auth()->user()->dosen->id)->first()->periode_id;
        }
        return view('backend.komponen-nilai.proposal', [
            'periode_id' => $periode_id,
            'item' => KomponenProposal::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($periode_id)->first(),
            'periodes' => Periode::whereNull('bulan')->get(),
            'periode_koor' => Periode::find($periode_id),
            'deadline_proposal' => DeadlineProposal::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($periode_id)->first(),
            'komponen_proposals' => KomponenProposal::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($periode_id)->get(),
            'total_komponen_proposal' => KomponenProposal::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($periode_id)->sum('persentase'),
            'komponen_proposal_latest' => KomponenProposal::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($periode_id)->orderBy('id', 'DESC')->first()
        ]);
    }

    public function updateDeadlineProposal(Request $request)
    {

        if (DeadlineProposal::where('prodi_id', auth()->user()->prodi_id)->where('periode_id', $request->periode_id)->first()) {
            DeadlineProposal::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($request->periode_id)->update([
                'deadline' => $request->tanggal_deadline_input_nilai
            ]);
        } else {

            DB::insert('insert into deadline_proposal (prodi_id, periode_id, deadline) values (?, ?, ?)', [auth()->user()->prodi_id, $request->periode_id, $request->tanggal_deadline_input_nilai]);

            // DeadlineProposal::create([
            //     'prodi_id' => auth()->user()->prodi_id,
            //     'periode_id' => $request->preiode_id,
            //     'deadline' => $request->tanggal_deadline_input_nilai
            // ]);
        }


        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    public function storeProposal(Request $request)
    {
        if (KomponenProposal::whereProdiId(auth()->user()->prodi_id)->where('periode_id', $request->periode_id)->sum('persentase') + $request->persentase > 100) {
            return redirect()->back()->with('warning', 'Total nilai komponen tidak boleh lebih dari 100');
        }
        // if (KomponenProposal::whereProdiId(auth()->user()->prodi_id)->whereTahunAjaran(Periode::find($request->periode_id)->tahun)->whereSemester(Periode::find($request->periode_id)->semester)->sum('persentase') + $request->persentase > 100) {
        //     return redirect()->back()->with('warning', 'Total nilai komponen tidak boleh lebih dari 100');
        // }
        $data = $request->all();
        // dd(DeadlineProposal::wherePeriodeId($request->periode_id)->whereProdiId(auth()->user()->prodi_id)->select('id')->first());
        if (!DeadlineProposal::wherePeriodeId($request->periode_id)->whereProdiId(auth()->user()->prodi_id)->select('id')->first()) {
            return redirect()->back()->with('warning', 'Anda belum mengatur deadline input Nilai');
        }
        $data['prodi_id'] = auth()->user()->prodi_id;
        $data['tahun_ajaran'] = Periode::find($request->periode_id)->tahun;
        $data['semester'] = Periode::find($request->periode_id)->semester;
        $data['deadline_proposal_id'] = DeadlineProposal::wherePeriodeId($request->periode_id)->whereProdiId(auth()->user()->prodi_id)->select('id')->first()->id;
        KomponenProposal::create($data);
        return redirect()->back()->with('success', 'Berhasil menambahkan data');
    }

    public function editProposal(Request $request)
    {
        return view('backend.komponen-nilai.proposal-edit', [
            'periode_id' => $request->periode_id,
            'item' => KomponenProposal::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($request->periode_id)->first(),
            'periodes' => Periode::whereNull('bulan')->get(),
            'periode_koor' => Periode::find($request->periode_id),
            'komponen_proposals' => KomponenProposal::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($request->periode_id)->get(),
            'total_komponen_proposal' => KomponenProposal::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($request->periode_id)->sum('persentase'),
            'komponen_proposal_latest' => KomponenProposal::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($request->periode_id)->orderBy('id', 'DESC')->first()
        ]);
    }

    public function updateProposal(Request $request)
    {
        $data = $request->all();
        // dd($data);
        if (!isset($data['persentase'])) {
            return redirect()->back()->with('warning', 'Belum ada komponen yang diinputkan');
        }
        if (array_sum($data['persentase']) > 100) {
            return redirect()->back()->with('warning', 'Total nilai komponen tidak boleh lebih dari 100');
        }
        foreach (KomponenProposal::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($request->periode_id)->get() as $key => $kp) {
            $kp->update([
                'nama_komponen' => $data['nama_komponen'][$key],
                'persentase' => $data['persentase'][$key],
            ]);
        }
        return back()->with('success', 'Berhasil Mengubah Data');
        // return view('backend.komponen-nilai.proposal', [
        //     'periode_id' => $data['periode_id'],
        //     'item' => KomponenProposal::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($data['periode_id'])->first(),
        //     'periodes' => Periode::all(),
        //     'komponen_proposals' => KomponenProposal::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($data['periode_id'])->get(),
        //     'total_komponen_proposal' => KomponenProposal::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($data['periode_id'])->sum('persentase'),
        //     'komponen_proposal_latest' => KomponenProposal::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($data['periode_id'])->orderBy('id', 'DESC')->first()
        // ])->with('success', 'Berhasil mengubah data');
    }

    public function uploadProposal()
    {
        return view('backend.komponen-nilai.proposal-upload');
    }

    public function storeUploadProposal(Request $request)
    {
        DB::beginTransaction();
        try {
            Excel::import(new ImportKomponenProposal, $request->file);
            DB::commit();
            return redirect()->route('backend.koordinator-pa.komponen-nilai.proposal')->with('success', 'Berhasil menambahkan data');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('warning', 'Gagal menambah data, silahkan cek kembali file anda');
        }
    }

    public function deleteProposal($id)
    {
        KomponenProposal::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }

    ########## PRASIDANG ##########

    public function prasidang($periode_id = null)
    {
        if ($periode_id == null) {
            $periode_id = DosenKoordinatorPA::whereDosenId(auth()->user()->dosen->id)->first()->periode_id;
        }
        return view('backend.komponen-nilai.prasidang', [
            'periode_id' => $periode_id,
            'item' => KomponenPrasidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($periode_id)->first(),
            'periodes' => Periode::whereNull('bulan')->get(),
            'periode_koor' => Periode::find($periode_id),
            'deadline_prasidang' => DeadlinePrasidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($periode_id)->first(),
            'komponen_prasidangs' => KomponenPrasidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($periode_id)->get(),
            'total_komponen_prasidang' => KomponenPrasidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($periode_id)->sum('persentase'),
            'komponen_prasidang_latest' => KomponenPrasidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($periode_id)->orderBy('id', 'DESC')->first()
        ]);
    }

    public function updateDeadlinePrasidang(Request $request)
    {

        if (DeadlinePrasidang::where('prodi_id', auth()->user()->prodi_id)->where('periode_id', $request->periode_id)->first()) {
            DeadlinePrasidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($request->periode_id)->update([
                'deadline' => $request->tanggal_deadline_input_nilai
            ]);
        } else {

            DB::insert('insert into deadline_prasidang (prodi_id, periode_id, deadline) values (?, ?, ?)', [auth()->user()->prodi_id, $request->periode_id, $request->tanggal_deadline_input_nilai]);
        }
        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    public function storePrasidang(Request $request)
    {
        if (KomponenPrasidang::whereProdiId(auth()->user()->prodi_id)->where('periode_id', $request->periode_id)->sum('persentase') + $request->persentase > 100) {
            return redirect()->back()->with('warning', 'Total nilai komponen tidak boleh lebih dari 100');
        }
        // if (KomponenPrasidang::whereProdiId(auth()->user()->prodi_id)->whereTahunAjaran(Periode::find($request->periode_id)->tahun)->whereSemester(Periode::find($request->periode_id)->semester)->sum('persentase') + $request->persentase > 100) {
        //     return redirect()->back()->with('warning', 'Total nilai komponen tidak boleh lebih dari 100');
        // }
        $data = $request->all();
        if (!DeadlinePrasidang::wherePeriodeId($request->periode_id)->whereProdiId(auth()->user()->prodi_id)->select('id')->first()) {
            return redirect()->back()->with('warning', 'Anda belum mengatur deadline input Nilai');
        }
        $data['prodi_id'] = auth()->user()->prodi_id;
        $data['tahun_ajaran'] = Periode::find($request->periode_id)->tahun;
        $data['semester'] = Periode::find($request->periode_id)->semester;
        $data['deadline_prasidang_id'] = DeadlinePrasidang::wherePeriodeId($request->periode_id)->whereProdiId(auth()->user()->prodi_id)->select('id')->first()->id;
        KomponenPrasidang::create($data);

        return redirect()->back()->with('success', 'Berhasil menambahkan data');
    }

    public function editPrasidang(Request $request)
    {
        return view('backend.komponen-nilai.prasidang-edit', [
            'periode_id' => $request->periode_id,
            'item' => KomponenPrasidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($request->periode_id)->first(),
            'periodes' => Periode::whereNull('bulan')->get(),
            'periode_koor' => Periode::find($request->periode_id),
            'komponen_prasidangs' => KomponenPrasidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($request->periode_id)->get(),
            'total_komponen_prasidang' => KomponenPrasidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($request->periode_id)->sum('persentase'),
            'komponen_prasidang_latest' => KomponenPrasidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($request->periode_id)->orderBy('id', 'DESC')->first()
        ]);
    }

    public function updatePrasidang(Request $request)
    {
        $data = $request->all();
        if (array_sum($data['persentase']) > 100) {
            return redirect()->back()->with('warning', 'Total nilai komponen tidak boleh lebih dari 100');
        }
        foreach (KomponenPrasidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($request->periode_id)->get() as $key => $kp) {
            $kp->update([
                'nama_komponen' => $data['nama_komponen'][$key],
                'persentase' => $data['persentase'][$key],
            ]);
        }
        return view('backend.komponen-nilai.prasidang', [
            'periode_id' => $data['periode_id'],
            'item' => KomponenPrasidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($data['periode_id'])->first(),
            'periodes' => Periode::all(),
            'komponen_prasidangs' => KomponenPrasidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($data['periode_id'])->get(),
            'total_komponen_prasidang' => KomponenPrasidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($data['periode_id'])->sum('persentase'),
            'komponen_prasidang_latest' => KomponenPrasidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($data['periode_id'])->orderBy('id', 'DESC')->first()
        ])->with('success', 'Berhasil mengubah data');
    }

    public function uploadPrasidang()
    {
        return view('backend.komponen-nilai.prasidang-upload');
    }

    public function storeUploadPrasidang(Request $request)
    {
        DB::beginTransaction();
        try {
            Excel::import(new ImportKomponenPrasidang, $request->file);
            DB::commit();
            return redirect()->route('backend.koordinator-pa.komponen-nilai.prasidang')->with('success', 'Berhasil menambahkan data');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('warning', 'Gagal menambah data, silahkan cek kembali file anda');
        }
    }

    public function deletePrasidang($id)
    {
        KomponenPrasidang::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }

    ########## SIDANG ##########

    public function sidang($periode_id = null)
    {
        if ($periode_id == null) {
            $periode_id = DosenKoordinatorPA::whereDosenId(auth()->user()->dosen->id)->first()->periode_id;
        }
        return view('backend.komponen-nilai.sidang', [
            'periode_id' => $periode_id,
            'item' => KomponenSidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($periode_id)->first(),
            'periodes' => Periode::whereNull('bulan')->get(),
            'periode_koor' => Periode::find($periode_id),
            'deadline_sidang' => DeadlineSidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($periode_id)->first(),
            'komponen_sidangs' => KomponenSidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($periode_id)->get(),
            'total_komponen_sidang' => KomponenSidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($periode_id)->sum('persentase'),
            'komponen_sidang_latest' => KomponenSidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($periode_id)->orderBy('id', 'DESC')->first()
        ]);
    }

    public function updateDeadlineSidang(Request $request)
    {

        if (DeadlineSidang::where('prodi_id', auth()->user()->prodi_id)->where('periode_id', $request->periode_id)->first()) {
            DeadlineSidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($request->periode_id)->update([
                'deadline' => $request->tanggal_deadline_input_nilai
            ]);
        } else {

            DB::insert('insert into deadline_sidang (prodi_id, periode_id, deadline) values (?, ?, ?)', [auth()->user()->prodi_id, $request->periode_id, $request->tanggal_deadline_input_nilai]);
        }
        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    public function storeSidang(Request $request)
    {

        // dd($request->periode_id);
        if (KomponenSidang::whereProdiId(auth()->user()->prodi_id)->where('periode_id', $request->periode_id)->sum('persentase') + $request->persentase > 100) {
            return redirect()->back()->with('warning', 'Total nilai komponen tidak boleh lebih dari 100');
        }
        // if (KomponenSidang::whereProdiId(auth()->user()->prodi_id)->whereTahunAjaran(Periode::find($request->periode_id)->tahun)->whereSemester(Periode::find($request->periode_id)->semester)->sum('persentase') + $request->persentase > 100) {
        //     return redirect()->back()->with('warning', 'Total nilai komponen tidak boleh lebih dari 100');
        // }
        $data = $request->all();
        if (!DeadlineSidang::wherePeriodeId($request->periode_id)->whereProdiId(auth()->user()->prodi_id)->select('id')->first()) {
            return redirect()->back()->with('warning', 'Anda belum mengatur deadline input Nilai');
        }
        $data['prodi_id'] = auth()->user()->prodi_id;
        $data['tahun_ajaran'] = Periode::where('id', $request->periode_id)->select('tahun')->first()->tahun;
        $data['semester'] = Periode::where('id', $request->periode_id)->select('semester')->first()->semester;
        $data['deadline_sidang_id'] = DeadlineSidang::wherePeriodeId($request->periode_id)->whereProdiId(auth()->user()->prodi_id)->select('id')->first()->id;
        KomponenSidang::create($data);
        return redirect()->back()->with('success', 'Berhasil menambahkan data');
    }

    public function editSidang(Request $request)
    {
        return view('backend.komponen-nilai.sidang-edit', [
            'periode_id' => $request->periode_id,
            'item' => KomponenSidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($request->periode_id)->first(),
            'periodes' => Periode::whereNull('bulan')->get(),
            'periode_koor' => Periode::find($request->periode_id),
            'komponen_sidangs' => KomponenSidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($request->periode_id)->get(),
            'total_komponen_sidang' => KomponenSidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($request->periode_id)->sum('persentase'),
            'komponen_sidang_latest' => KomponenSidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($request->periode_id)->orderBy('id', 'DESC')->first()
        ]);
    }

    public function updateSidang(Request $request)
    {
        $data = $request->all();
        if (array_sum($data['persentase']) > 100) {
            return redirect()->back()->with('warning', 'Total nilai komponen tidak boleh lebih dari 100');
        }
        foreach (KomponenSidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($request->periode_id)->get() as $key => $kp) {
            $kp->update([
                'nama_komponen' => $data['nama_komponen'][$key],
                'keterangan' => $data['keterangan'][$key],
                'persentase' => $data['persentase'][$key],
            ]);
        }
        return view('backend.komponen-nilai.sidang', [
            'periode_id' => $data['periode_id'],
            'item' => KomponenSidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($data['periode_id'])->first(),
            'periodes' => Periode::all(),
            'komponen_sidangs' => KomponenSidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($data['periode_id'])->get(),
            'total_komponen_sidang' => KomponenSidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($data['periode_id'])->sum('persentase'),
            'komponen_sidang_latest' => KomponenSidang::whereProdiId(auth()->user()->prodi_id)->wherePeriodeId($data['periode_id'])->orderBy('id', 'DESC')->first()
        ])->with('success', 'Berhasil mengubah data');
    }

    public function uploadSidang()
    {
        return view('backend.komponen-nilai.sidang-upload');
    }

    public function storeUploadSidang(Request $request)
    {
        DB::beginTransaction();
        try {
            Excel::import(new ImportKomponenSidang, $request->file);
            DB::commit();
            return redirect()->route('backend.koordinator-pa.komponen-nilai.sidang')->with('success', 'Berhasil menambahkan data');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('warning', 'Gagal menambah data, silahkan cek kembali file anda');
        }
    }

    public function deleteSidang($id)
    {
        KomponenSidang::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
