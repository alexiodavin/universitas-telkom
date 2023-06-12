<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ImportMahasiswaProposal;
use App\Imports\ImportMahasiswaPrasidang;
use App\Imports\ImportMahasiswaSidang;
use App\Imports\ImportJadwalPrasidang;
use App\Imports\ImportJadwalSidang;
use App\Exports\ExportPrasidang;
use App\Exports\ExportSidang;
use Maatwebsite\Excel\Facades\Excel;

// use DB;
use Illuminate\Support\Facades\DB;

use App\Models\Periode;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Proposal;
use App\Models\Prasidang;
use App\Models\Sidang;
use App\Models\Ruangan;
use App\Models\JadwalPrasidang;
use App\Models\JadwalSidang;
use App\Models\HistoriJudulProposal;
use App\Models\HistoriJudulPrasidang;
use App\Models\TahunAjaran;

class UploadDaftarMahasiswaController extends Controller
{
    ##### PROPOSAL #####

    public function proposal()
    {
        return view('backend.upload-daftar-mahasiswa.proposal', [
            'items' => Proposal::all(),
            'list_tahun_ajaran' => TahunAjaran::where('is_active', 1)->get(),
        ]);
    }

    public function createProposal(Request $request)
    {

        if ($request->ajax()) {
            if ($request->dosen_id_pbb1) {
                $nama_dosen = DB::table('dosen')
                    ->where('dosen.id', '=', $request->dosen_id_pbb1)
                    ->select('dosen.nama')
                    ->first();

                $dosen_pbb2_id = Dosen::where('id', '!=', $request->dosen_id_pbb1)->get();
                // dd($dosen_pbb2_id);

                return response()->json([
                    'nama_dosen' => $nama_dosen->nama,
                    'dosen_pbb2_id' => $dosen_pbb2_id
                ]);
            } elseif ($request->dosen_id_pbb2) {

                $nama_dosen = DB::table('dosen')
                    ->where('dosen.id', '=', $request->dosen_id_pbb2)
                    ->select('dosen.nama')
                    ->first();
                // dd($request->dosen_id_pbb2);

                return response()->json([
                    'nama_dosen' => $nama_dosen->nama
                ]);
            } elseif ($request->dosen_id_penguji1) {

                $nama_dosen = DB::table('dosen')
                    ->where('dosen.id', '=', $request->dosen_id_penguji1)
                    ->select('dosen.nama')
                    ->first();

                $dosen_id_penguji2 = Dosen::where('id', '!=', $request->dosen_id_penguji1)->get();

                return response()->json([
                    'nama_dosen' => $nama_dosen->nama,
                    'dosen_id_penguji2' => $dosen_id_penguji2
                ]);
            } else {
                $nama_dosen = DB::table('dosen')
                    ->where('dosen.id', '=', $request->dosen_id_penguji2)
                    ->select('dosen.nama')
                    ->first();

                return response()->json([
                    'nama_dosen' => $nama_dosen->nama
                ]);
            }
        }

        $dosen_prodi = DB::table('dosen')
            ->join('users', 'dosen.user_id', '=', 'users.id')
            ->where('users.prodi_id', '=', auth()->user()->prodi_id)
            ->select('dosen.kode', 'dosen.id')
            ->orderBy('nama', 'ASC')
            ->get();

        // dd($dosen_prodi);

        return view('backend.upload-daftar-mahasiswa.proposal-create', [
            'periodes' => Periode::whereNull('bulan')->get(),
            'list_tahun_ajaran' => TahunAjaran::where('is_active', 1)->get(),
            'periode_koor' => Periode::find($request->periode_id),
            'mahasiswas' => Mahasiswa::orderBy('nama', 'ASC')->get(),
            'pembimbing_1' => $dosen_prodi,
            'dosens' => Dosen::orderBy('nama', 'ASC')->get(),
        ]);
    }

    public function storeProposal(Request $request)
    {
        $data = $request->all();
        $cek_periode = Periode::where('tahun_ajaran', $request->tahun_ajaran)->where('semester', $request->semester)->where('bulan', $request->bulan)->where('jenis_periode', 'Proposal')->first();
        if ($cek_periode) {
            $data['periode_id'] = $cek_periode->id;
        } else {
            $periode = Periode::create([
                'tahun_ajaran' => $request->tahun_ajaran,
                'semester' => $request->semester,
                'bulan' => $request->bulan,
                'jenis_periode' => 'Proposal',
            ]);
            $data['periode_id'] = $periode->id;
        }
        if (Proposal::wherePeriodeId($request->periode_id)->whereMahasiswaId($request->mahasiswa_id)->first()) {
            return redirect()->back()->with('warning', 'Data sudah terdaftar');
        }
        // $data['tahun_ajaran'] = Periode::find($request->periode_id)->tahun;
        // $data['semester'] = Periode::find($request->periode_id)->semester;
        if (!Proposal::where('mahasiswa_id', $data['mahasiswa_id'])->where('periode_id', $data['periode_id'])->first()) {
            Proposal::create($data);
        } else {
            return back()->with('warning', 'Proposal Mahasiswa ini sudah terdaftar di periode ini sebelumnya, hapus data proposal mahasiswa terlebih dahulu agar tidak terjadi redudansi data');
        }
        return redirect()->route('backend.koordinator-pa.upload-daftar-mahasiswa.proposal')->with('success', 'Berhasil menambahkan data');
    }

    public function uploadProposal(Request $request)
    {
        DB::beginTransaction();
        try {
            Excel::import(new ImportMahasiswaProposal, $request->file);
            DB::commit();
            return redirect()->route('backend.koordinator-pa.upload-daftar-mahasiswa.proposal')->with('success', 'Berhasil menambahkan data');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('warning', 'Gagal menambah data, silahkan cek kembali file anda');
        }
    }

    public function editProposal($id)
    {
        return view('backend.upload-daftar-mahasiswa.proposal-edit', [
            'item' => Proposal::find($id),
            'periodes' => Periode::where('jenis_periode', 'Proposal')->get(),
            'mahasiswas' => Mahasiswa::orderBy('nama', 'ASC')->get(),
            'dosens' => Dosen::orderBy('nama', 'ASC')->get(),
        ]);
    }

    public function updateProposal(Request $request, $id)
    {
        $data = $request->all();
        Proposal::find($id)->update($data);
        return redirect()->route('backend.koordinator-pa.upload-daftar-mahasiswa.proposal')->with('success', 'Berhasil mengubah data');
    }

    public function deleteProposal(Request $request, $id)
    {
        $data = $request->all();
        Proposal::find($id)->delete();
        return redirect()->route('backend.koordinator-pa.upload-daftar-mahasiswa.proposal')->with('success', 'Berhasil menghapus data');
    }

    ##### END PROPOSAL #####

    ##### PRASIDANG #####

    public function prasidang(Request $request)
    {

        if ($request->ajax()) {
            // dd($request->all());

            DB::table('prasidang')->where('id', $request->prasidang_id)->update([
                'keterangan' => $request->keterangan
            ]);

            // $response = DB::table('prasidang')->where('id', $request->prasidang_id)->get();
            return response()->json();
        }
        return view('backend.upload-daftar-mahasiswa.prasidang', [
            'items' => Prasidang::all()
        ]);
    }

    public function createPrasidang(Request $request)
    {

        if ($request->ajax()) {
            if ($request->dosen_id_pbb1) {
                $nama_dosen = DB::table('dosen')
                    ->where('dosen.id', '=', $request->dosen_id_pbb1)
                    ->select('dosen.nama')
                    ->first();

                $dosen_pbb2_id = Dosen::where('id', '!=', $request->dosen_id_pbb1)->get();
                // dd($dosen_pbb2_id);

                return response()->json([
                    'nama_dosen' => $nama_dosen->nama,
                    'dosen_pbb2_id' => $dosen_pbb2_id
                ]);
            } elseif ($request->dosen_id_pbb2) {

                $nama_dosen = DB::table('dosen')
                    ->where('dosen.id', '=', $request->dosen_id_pbb2)
                    ->select('dosen.nama')
                    ->first();
                // dd($request->dosen_id_pbb2);

                return response()->json([
                    'nama_dosen' => $nama_dosen->nama
                ]);
            } elseif ($request->dosen_id_penguji1) {

                $nama_dosen = DB::table('dosen')
                    ->where('dosen.id', '=', $request->dosen_id_penguji1)
                    ->select('dosen.nama')
                    ->first();

                $dosen_id_penguji2 = Dosen::where('id', '!=', $request->dosen_id_penguji1)->get();

                return response()->json([
                    'nama_dosen' => $nama_dosen->nama,
                    'dosen_id_penguji2' => $dosen_id_penguji2
                ]);
            } else {
                $nama_dosen = DB::table('dosen')
                    ->where('dosen.id', '=', $request->dosen_id_penguji2)
                    ->select('dosen.nama')
                    ->first();

                return response()->json([
                    'nama_dosen' => $nama_dosen->nama
                ]);
            }
        }

        $dosen_prodi = DB::table('dosen')
            ->join('users', 'dosen.user_id', '=', 'users.id')
            ->where('users.prodi_id', '=', auth()->user()->prodi_id)
            ->select('dosen.kode', 'dosen.id')
            ->orderBy('nama', 'ASC')
            ->get();

        return view('backend.upload-daftar-mahasiswa.prasidang-create', [
            'periodes' => Periode::whereNull('bulan')->get(),
            'list_tahun_ajaran' => TahunAjaran::where('is_active', 1)->get(),
            'mahasiswas' => Mahasiswa::orderBy('nama', 'ASC')->get(),
            'pembimbing_1' => $dosen_prodi,
            'dosens' => Dosen::orderBy('nama', 'ASC')->get(),
        ]);
    }

    public function storePrasidang(Request $request)
    {
        $data = $request->all();
        $cek_periode = Periode::where('tahun_ajaran', $request->tahun_ajaran)->where('semester', $request->semester)->where('bulan', $request->bulan)->where('jenis_periode', 'Prasidang')->first();
        if ($cek_periode) {
            $data['periode_id'] = $cek_periode->id;
        } else {
            $periode = Periode::create([
                'tahun_ajaran' => $request->tahun_ajaran,
                'semester' => $request->semester,
                'bulan' => $request->bulan,
                'jenis_periode' => 'Prasidang',
            ]);
            $data['periode_id'] = $periode->id;
        }
        if ($request->idProposal) {
            $array_proposal = [];
            foreach ($request->idProposal as $key => $proposal) {
                $proposal_data = Proposal::where('id', $proposal)->first();
                // array_push($array_proposal, $proposal_data);
                // dd($proposal_data);
                $check = Proposal::whereMahasiswaId($proposal_data->mahasiswa_id)->first();
                if (!$check) {
                    $inserted_data = [
                        'mahasiswa_id' => $proposal_data->mahasiswa_id,
                        'pembimbing1_id' => $proposal_data->pembimbing1_id,
                        'pembimbing2_id' => $proposal_data->pembimbing2_id,
                        'penguji1_id' => $proposal_data->penguji1_id,
                        'penguji2_id' => $proposal_data->penguji2_id,
                        'periode_id' => $data['periode_id'],
                        'judul_indo' => $proposal_data->judul_indo,
                        'judul_inggris' => $proposal_data->judul_inggris,
                        'tahun_ajaran' => $request->tahun_ajaran,
                        'semester' => $request->semester
                    ];
                    // dd($inserted_data);
                    Prasidang::create($inserted_data);
                }
            }
            return redirect()->route('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang')->with('success', 'Berhasil menambahkan data');
            // dd($array_proposal);
        }
        if (Prasidang::wherePeriodeId($data['periode_id'])->whereMahasiswaId($request->mahasiswa_id)->first()) {
            return redirect()->back()->with('warning', 'Data sudah terdaftar');
        }
        // $data['tahun_ajaran'] = Periode::find($request->periode_id)->tahun;
        // $data['semester'] = Periode::find($request->periode_id)->semester;
        Prasidang::create($data);
        return redirect()->route('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang')->with('success', 'Berhasil menambahkan data');
    }

    public function uploadPrasidang(Request $request)
    {
        DB::beginTransaction();
        try {
            Excel::import(new ImportMahasiswaPrasidang, $request->file);
            DB::commit();
            return redirect()->route('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang')->with('success', 'Berhasil menambahkan data');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('warning', 'Gagal menambah data, silahkan cek kembali file anda');
        }
    }

    public function editPrasidang($id)
    {
        return view('backend.upload-daftar-mahasiswa.prasidang-edit', [
            'item' => Prasidang::find($id),
            'periodes' => Periode::where('jenis_periode', 'Prasidang')->get(),
            'mahasiswas' => Mahasiswa::orderBy('nama', 'ASC')->get(),
            'dosens' => Dosen::orderBy('nama', 'ASC')->get(),
        ]);
    }

    public function updatePrasidang(Request $request, $id)
    {
        $data = $request->all();
        Prasidang::find($id)->update($data);
        return redirect()->route('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang')->with('success', 'Berhasil mengubah data');
    }

    public function inputJadwalPrasidangPrasidang($id)
    {
        return view('backend.upload-daftar-mahasiswa.prasidang-jadwal', [

            'item' => Prasidang::find($id),
            'jadwal_prasidang' => JadwalPrasidang::wherePrasidangId($id)->first(),
            'ruangans' => Ruangan::where('is_active', 1)->get(),
            'periodes' => Periode::whereNull('bulan')->get(),
        ]);
    }

    public function UpdateInputJadwalPrasidangPrasidang(Request $request, $id)
    {
        $data = $request->all();
        $data['prasidang_id'] = $id;
        $data['ruangan'] = $request->ruangan_id ? Ruangan::find($request->ruangan_id)->nama : $request->ruangan;
        if (session('auth_login') == 'koordinator_pa') {
            $this->validate($request, [
                'bulan' => 'required',
                'tanggal_prasidang' => 'required',
                'jam_mulai_prasidang' => 'required',
                'jam_selesai_prasidang' => 'required',
            ]);
            JadwalPrasidang::create($data);
        } else {
            $check = [];
            if (!$request->ruangan_id) {
                $check['ruangan'] = 'required'; 
            }
            $this->validate($request, $check);
            JadwalPrasidang::where('id', $request->jadwal_id)->update([
                'ruangan_id' => $request->ruangan_id,
                'ruangan' => $data['ruangan']
            ]);
        }
        if (session('auth_login') == 'koordinator_pa') {
            return redirect()->route('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang')->with('success', 'Berhasil mengubah data');
        } else {
            return redirect()->route('backend.admin.jadwal.prasidang')->with('success', 'Berhasil mengubah data');
        }
    }

    public function deletePrasidang(Request $request, $id)
    {
        $data = $request->all();
        Prasidang::find($id)->delete();
        return redirect()->route('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang')->with('success', 'Berhasil menghapus data');
    }

    public function uploadJadwalPrasidang()
    {
        return view('backend.upload-daftar-mahasiswa.prasidang-upload-jadwal');
    }

    public function storeUploadJadwalPrasidang(Request $request)
    {
        DB::beginTransaction();
        try {
            Excel::import(new ImportJadwalPrasidang, $request->file);
            DB::commit();
            return redirect()->route('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang')->with('success', 'Berhasil menambahkan data');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('warning', 'Gagal menambah data, silahkan cek kembali file anda');
        }
    }

    public function downloadPrasidang()
    {
        return Excel::download(new ExportPrasidang, 'prasidang.xlsx');
    }

    ##### END PRASIDANG #####

    ##### SIDANG #####

    public function sidang()
    {
        return view('backend.upload-daftar-mahasiswa.sidang', [
            'items' => Sidang::all()
        ]);
    }

    public function createSidang(Request $request)
    {

        if ($request->ajax()) {
            if ($request->dosen_id_pbb1) {
                $nama_dosen = DB::table('dosen')
                    ->where('dosen.id', '=', $request->dosen_id_pbb1)
                    ->select('dosen.nama')
                    ->first();

                $dosen_pbb2_id = Dosen::where('id', '!=', $request->dosen_id_pbb1)->get();
                // dd($dosen_pbb2_id);

                return response()->json([
                    'nama_dosen' => $nama_dosen->nama,
                    'dosen_pbb2_id' => $dosen_pbb2_id
                ]);
            } elseif ($request->dosen_id_pbb2) {

                $nama_dosen = DB::table('dosen')
                    ->where('dosen.id', '=', $request->dosen_id_pbb2)
                    ->select('dosen.nama')
                    ->first();
                // dd($request->dosen_id_pbb2);

                return response()->json([
                    'nama_dosen' => $nama_dosen->nama
                ]);
            } elseif ($request->dosen_id_penguji1) {

                $nama_dosen = DB::table('dosen')
                    ->where('dosen.id', '=', $request->dosen_id_penguji1)
                    ->select('dosen.nama')
                    ->first();

                $dosen_id_penguji2 = Dosen::where('id', '!=', $request->dosen_id_penguji1)->get();

                return response()->json([
                    'nama_dosen' => $nama_dosen->nama,
                    'dosen_id_penguji2' => $dosen_id_penguji2
                ]);
            } else {
                $nama_dosen = DB::table('dosen')
                    ->where('dosen.id', '=', $request->dosen_id_penguji2)
                    ->select('dosen.nama')
                    ->first();

                return response()->json([
                    'nama_dosen' => $nama_dosen->nama
                ]);
            }
        }

        $dosen_prodi = DB::table('dosen')
            ->join('users', 'dosen.user_id', '=', 'users.id')
            ->where('users.prodi_id', '=', auth()->user()->prodi_id)
            ->select('dosen.kode', 'dosen.id')
            ->orderBy('nama', 'ASC')
            ->get();

        return view('backend.upload-daftar-mahasiswa.sidang-create', [
            'periodes' => Periode::whereNull('bulan')->get(),
            'mahasiswas' => Mahasiswa::orderBy('nama', 'ASC')->get(),
            'pembimbing_1' => $dosen_prodi,
            'dosens' => Dosen::orderBy('nama', 'ASC')->get(),
        ]);
    }

    public function storeSidang(Request $request)
    {
        $data = $request->all();
        if (Sidang::wherePeriodeId($request->periode_id)->whereMahasiswaId($request->mahasiswa_id)->first()) {
            return redirect()->back()->with('warning', 'Data sudah terdaftar');
        }
        $data['tahun_ajaran'] = Periode::find($request->periode_id)->tahun;
        $data['semester'] = Periode::find($request->periode_id)->semester;
        Sidang::create($data);
        return redirect()->route('backend.koordinator-pa.upload-daftar-mahasiswa.sidang')->with('success', 'Berhasil menambahkan data');
    }

    public function uploadSidang(Request $request)
    {
        DB::beginTransaction();
        try {
            Excel::import(new ImportMahasiswaSidang, $request->file);
            DB::commit();
            return redirect()->route('backend.koordinator-pa.upload-daftar-mahasiswa.sidang')->with('success', 'Berhasil menambahkan data');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('warning', 'Gagal menambah data, silahkan cek kembali file anda');
        }
    }

    public function editSidang($id)
    {
        return view('backend.upload-daftar-mahasiswa.sidang-edit', [
            'item' => Sidang::find($id),
            'periodes' => Periode::whereNull('bulan')->get(),
            'mahasiswas' => Mahasiswa::orderBy('nama', 'ASC')->get(),
            'dosens' => Dosen::orderBy('nama', 'ASC')->get(),
        ]);
    }

    public function updateSidang(Request $request, $id)
    {
        $data = $request->all();
        Sidang::find($id)->update($data);
        return redirect()->route('backend.koordinator-pa.upload-daftar-mahasiswa.sidang')->with('success', 'Berhasil mengubah data');
    }

    public function inputJadwalSidangSidang($id)
    {
        return view('backend.upload-daftar-mahasiswa.sidang-jadwal', [
            'item' => Sidang::find($id),
            'jadwal_sidang' => JadwalSidang::whereSidangId($id)->first(),
            'ruangans' => Ruangan::where('is_active', 1)->get(),
            'periodes' => Periode::whereNull('bulan')->get(),
        ]);
    }

    public function UpdateInputJadwalSidangSidang(Request $request, $id)
    {
        $data = $request->all();
        $data['sidang_id'] = $id;
        $data['ruangan'] = $request->ruangan_id ? Ruangan::find($request->ruangan_id)->nama : $request->ruangan;
        if (session('auth_login') == 'koordinator_pa') {
            JadwalSidang::create($data);
        } else {
            JadwalSidang::where('id', $request->jadwal_id)->update([
                'ruangan_id' => $request->ruangan_id,
                'ruangan' => $data['ruangan']
            ]);
        }
        if (session('auth_login') == 'koordinator_pa') {
            return redirect()->route('backend.koordinator-pa.upload-daftar-mahasiswa.sidang')->with('success', 'Berhasil mengubah data');
        } else {
            return redirect()->route('backend.admin.jadwal.sidang')->with('success', 'Berhasil mengubah data');
        }
    }

    public function deleteSidang(Request $request, $id)
    {
        $data = $request->all();
        Sidang::find($id)->delete();
        return redirect()->route('backend.koordinator-pa.upload-daftar-mahasiswa.sidang')->with('success', 'Berhasil menghapus data');
    }

    public function uploadJadwalSidang()
    {
        return view('backend.upload-daftar-mahasiswa.sidang-upload-jadwal');
    }

    public function storeUploadJadwalSidang(Request $request)
    {
        DB::beginTransaction();
        try {
            Excel::import(new ImportJadwalSidang, $request->file);
            DB::commit();
            return redirect()->route('backend.koordinator-pa.upload-daftar-mahasiswa.sidang')->with('success', 'Berhasil menambahkan data');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('warning', 'Gagal menambah data, silahkan cek kembali file anda');
        }
    }

    public function downloadSidang()
    {
        return Excel::download(new ExportSidang, 'sidang.xlsx');
    }

    ##### END SIDANG #####
}
