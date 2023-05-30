<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\MultipartHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Multipart;
use App\Models\NilaiMutu;

use App\Models\Proposal;
use App\Models\NilaiProposal;
use App\Models\KomponenProposal;
use App\Models\NilaiProposalFinal;
use App\Models\DetailNilaiProposal;

use App\Models\Prasidang;
use App\Models\NilaiPrasidang;
use App\Models\KomponenPrasidang;
use App\Models\NilaiPrasidangFinal;
use App\Models\DetailNilaiPrasidang;
use App\Models\Periode;

class NilaiMahasiswaController extends Controller
{
    public function proposal()
    {
        session(['role_dosen' => 'penguji']);
        $items = Proposal::where('penguji1_id', auth()->user()->dosen->id)->orWhere('penguji2_id', auth()->user()->dosen->id)->get();
        foreach ($items as $proposal) {
            $proposal['deadline'] = KomponenProposal::whereProdiId($proposal->mahasiswa->mahasiswa_import->prodi->id)->wherePeriodeId($proposal->periode_id)->first()->tanggal_deadline_input_nilai ?? null;
        }
        return view('backend.nilai-mahasiswa.proposal', [
            'items' => $items
        ]);
    }

    public function editProposal($id)
    {
        // return Proposal::find($id);        
        $nilai_total_penguji1 = NilaiProposal::where('proposal_id', $id)->where('penguji', 1)->first();
        $nilai_total_penguji2 = NilaiProposal::where('proposal_id', $id)->where('penguji', 2)->first();
        $nilai_total = 0;

        // dd($nilai_total_penguji2->proposal->id);

        if ($nilai_total_penguji1) {
            if ($nilai_total_penguji1->proposal->penguji1_id == auth()->user()->dosen->id) {
                $nilai_total_penguji1 ? $nilai_total = $nilai_total_penguji1->nilai_akhir : $nilai_total = 0;
            }
        } elseif ($nilai_total_penguji2) {
            if ($nilai_total_penguji2->proposal->penguji2_id == auth()->user()->dosen->id)
                $nilai_total_penguji2 ? $nilai_total = $nilai_total_penguji2->nilai_akhir : $nilai_total = 0;
        }

        // dd($nilai_total);

        $proposal = Proposal::find($id);

        $periode_upload = Periode::where('id', $proposal->periode_id)->first();
        $periode = Periode::where('tahun_ajaran', $periode_upload->tahun_ajaran)->where('semester', $periode_upload->semester)->whereNull('bulan')->first();
        return view('backend.nilai-mahasiswa.proposal-edit', [
            'item' => $proposal,
            'items' => KomponenProposal::where('periode_id', $periode->id)->get(),
            'nilai_total' => $nilai_total,
            'nilai_final' => NilaiProposalFinal::whereProposalId($id)->first()
        ]);
    }

    public function editDetailNilaiProposal($id)
    {
        // return Proposal::find($id);        
        $nilai_total_penguji1 = NilaiProposal::where('proposal_id', $id)->where('penguji', 1)->first();
        $nilai_total_penguji2 = NilaiProposal::where('proposal_id', $id)->where('penguji', 2)->first();
        $nilai_total = 0;

        // dd($nilai_total_penguji2->proposal->id);

        if ($nilai_total_penguji1) {
            if ($nilai_total_penguji1->proposal->penguji1_id == auth()->user()->dosen->id) {
                $nilai_total_penguji1 ? $nilai_total = $nilai_total_penguji1->nilai_akhir : $nilai_total = 0;
            }
        } elseif ($nilai_total_penguji2) {
            if ($nilai_total_penguji2->proposal->penguji2_id == auth()->user()->dosen->id)
                $nilai_total_penguji2 ? $nilai_total = $nilai_total_penguji2->nilai_akhir : $nilai_total = 0;
        }

        // dd($nilai_total);

        return view('backend.nilai-mahasiswa.proposal-edit-detail-nilai', [
            'item' => Proposal::find($id),
            'items' => KomponenProposal::all(),
            'nilai_total' => $nilai_total,
            'nilai_final' => NilaiProposalFinal::whereProposalId($id)->first()
        ]);
    }

    public function updateDetailNilaiProposal(Request $request, $id)
    {

        // dd($request->nilai);
        $id_terakhir = 0;
        foreach ($request->nilai as $key => $value) {
            DetailNilaiProposal::where('id', $key)->update([
                'nilai' => $value
            ]);
            $id_terakhir = $value;
        }
        $detail_nilai_proposal = DetailNilaiProposal::find($id_terakhir);

        NilaiProposal::where('id', $detail_nilai_proposal->nilai_proposal_id)->update([
            'nilai_akhir' => array_sum($request->nilai),
        ]);

        return redirect()->route('backend.dosen.nilai-mahasiswa.proposal.edit', ['id' => $id])->with(['success' => 'Berhasil mengubah data', 'nilai_akhir' => array_sum($request->nilai)]);
    }

    public function updateNilaiProposal(Request $request, $id)
    {

        if ($request->ajax()) {
            NilaiProposal::where('proposal_id', $request->id)->where('penguji', $request->penguji)->delete();
            return response()->json(['id' => $request->id]);
            // dd($request);
        }

        $item = Proposal::find($id);
        if ($item->penguji1_id == auth()->user()->dosen->id) {
            if ($item->nilai_penguji1 == null) {
                $nilai_proposal = NilaiProposal::create([
                    'proposal_id' => $item->id,
                    'penguji' => 1,
                    'nilai_akhir' => array_sum($request->nilai),
                ]);
                foreach (KomponenProposal::all() as $key => $kp) {
                    DetailNilaiProposal::create([
                        'nilai_proposal_id' => $nilai_proposal->id,
                        'komponen_proposal_id' => $kp->id,
                        'nilai' => $request->nilai[$key]
                    ]);
                }
            };

            $nilai_total = NilaiProposal::where('proposal_id', $id)->select('nilai_akhir')->get();
            $nilai_akhir = $nilai_total[0]->nilai_akhir;
            // dd($nilai_akhir);
            return redirect()->route('backend.dosen.nilai-mahasiswa.proposal.edit', ['id' => $item->id])->with(['success' => 'Berhasil mengubah data', 'nilai_akhir' => $nilai_akhir]);
        } elseif ($item->penguji2_id == auth()->user()->dosen->id) {
            if ($item->nilai_penguji2 == null) {
                $nilai_proposal = NilaiProposal::create([
                    'proposal_id' => $item->id,
                    'penguji' => 2,
                    'nilai_akhir' => array_sum($request->nilai),
                ]);
                foreach (KomponenProposal::all() as $key => $kp) {
                    DetailNilaiProposal::create([
                        'nilai_proposal_id' => $nilai_proposal->id,
                        'komponen_proposal_id' => $kp->id,
                        'nilai' => $request->nilai[$key]
                    ]);
                }
            };
            $nilai_total = NilaiProposal::where('proposal_id', $id)->select('nilai_akhir')->get();
            $nilai_akhir = $nilai_total[0]->nilai_akhir;
            return redirect()->route('backend.dosen.nilai-mahasiswa.proposal.edit', ['id' => $item->id])->with(['success' => 'Berhasil mengubah data', 'nilai_akhir' => $nilai_akhir]);
        }
    }

    public function updateProposal(Request $request, $id)
    {
        $item = Proposal::find($id);
        if ($item->penguji1_id == auth()->user()->dosen->id) {
            $nilai_proposal = NilaiProposal::whereProposalId($id)->wherePenguji(1)->first();
            if ($nilai_proposal) {
                $nilai_proposal->update([
                    'file' => MultipartHelper::fileUpload($request->file),
                    'catatan' => $request->catatan,
                    'tanggal_penilaian' => date('Y-m-d H:i:s')
                ]);
            } else {
                $insert_to = NilaiProposal::whereProposalId($id);
                $insert_to->insert([
                    'file' => MultipartHelper::fileUpload($request->file),
                    'catatan' => $request->catatan,
                    'tanggal_penilaian' => date('Y-m-d H:i:s'),
                    'penguji' => 1
                ]);
            }
            $nilai_total = NilaiProposal::where('proposal_id', $id)->select('nilai_akhir')->get();
            $nilai_akhir = $nilai_total[0]->nilai_akhir;
            return redirect()->route('backend.dosen.nilai-mahasiswa.proposal.edit', ['id' => $item->id])->with(['success' => 'Berhasil mengubah data', 'nilai_akhir' => $nilai_akhir]);
        } elseif ($item->penguji2_id == auth()->user()->dosen->id) {
            $nilai_proposal = NilaiProposal::whereProposalId($id)->wherePenguji(2)->first();
            if ($nilai_proposal) {
                $nilai_proposal->update([
                    'file' => MultipartHelper::fileUpload($request->file),
                    'catatan' => $request->catatan,
                    'tanggal_penilaian' => date('Y-m-d H:i:s')
                ]);
            } else {
                $insert_to = NilaiProposal::whereProposalId($id);
                $insert_to->insert([
                    'file' => MultipartHelper::fileUpload($request->file),
                    'catatan' => $request->catatan,
                    'tanggal_penilaian' => date('Y-m-d H:i:s'),
                    'penguji' => 2
                ]);
            }
            $nilai_total = NilaiProposal::where('proposal_id', $id)->select('nilai_akhir')->get();
            $nilai_akhir = $nilai_total[0]->nilai_akhir;
            return redirect()->route('backend.dosen.nilai-mahasiswa.proposal.edit', ['id' => $item->id])->with(['success' => 'Berhasil mengubah data', 'nilai_akhir' => $nilai_akhir]);
        }
    }

    public function setNilaiAkhirProposal($id)
    {
        $item = Proposal::find($id);
        $nilai_akhir = ($item->nilai_penguji1->nilai_akhir + $item->nilai_penguji2->nilai_akhir) / 2;
        foreach (NilaiMutu::wherePeriodeId($item->periode_id)->get() as $nm) {
            if ($nilai_akhir >= $nm->nilai_min && $nilai_akhir <= $nm->nilai_maks) {
                $nilai_mutu = $nm->index;
            }
        }
        NilaiProposalFinal::create([
            'proposal_id' => $item->id,
            'tanggal' => date('Y-m-d'),
            'nilai_final' => $nilai_akhir,
            'nilai_mutu' => $nilai_mutu,
            'status' => $nilai_akhir > 50 ? 'Lulus' : 'Tidak Lulus',
        ]);
        return redirect()->route('backend.dosen.nilai-mahasiswa.proposal.edit', ['id' => $item->id])->with('success', 'Berhasil mengubah data');
    }

    ################################# PRASIDANG #################################

    public function prasidang()
    {
        session(['role_dosen' => 'penguji']);
        $items = Prasidang::where('penguji1_id', auth()->user()->dosen->id)->orWhere('penguji2_id', auth()->user()->dosen->id)->get();
        foreach ($items as $prasidang) {
            $prasidang['deadline'] = KomponenPrasidang::whereProdiId($prasidang->mahasiswa->mahasiswa_import->prodi->id)->wherePeriodeId($prasidang->periode_id)->first()->tanggal_deadline_input_nilai ?? null;
        }
        return view('backend.nilai-mahasiswa.prasidang', [
            'items' => $items
        ]);
    }

    public function editPrasidang($id)
    {
        $nilai_total_penguji1 = NilaiPrasidang::where('prasidang_id', $id)->where('penguji', 1)->first();
        $nilai_total_penguji2 = NilaiPrasidang::where('prasidang_id', $id)->where('penguji', 2)->first();
        $nilai_total = 0;

        // dd($nilai_total_penguji1);

        if ($nilai_total_penguji1) {
            if ($nilai_total_penguji1->prasidang->penguji1_id == auth()->user()->dosen->id) {
                $nilai_total_penguji1 ? $nilai_total = $nilai_total_penguji1->nilai_akhir : $nilai_total = 0;
            }
        } elseif ($nilai_total_penguji2) {
            if ($nilai_total_penguji2->prasidang->penguji2_id == auth()->user()->dosen->id)
                $nilai_total_penguji2 ? $nilai_total = $nilai_total_penguji2->nilai_akhir : $nilai_total = 0;
        }
        return view('backend.nilai-mahasiswa.prasidang-edit', [
            'item' => Prasidang::find($id),
            'items' => KomponenPrasidang::all(),
            'nilai_total' => $nilai_total,
            'nilai_final' => NilaiPrasidangFinal::wherePrasidangId($id)->first()
        ]);
    }

    public function updateNilaiPrasidang(Request $request, $id)
    {

        if ($request->ajax()) {
            // dd($request->all());
            NilaiPrasidang::where('prasidang_id', $request->id)->where('penguji', $request->penguji)->first()->delete();
            return response()->json(['id' => $request->id]);
            // dd($request);
        }

        $item = Prasidang::find($id);
        if ($item->penguji1_id == auth()->user()->dosen->id) {
            if ($item->nilai_penguji1 == null) {
                $nilai_prasidang = NilaiPrasidang::create([
                    'prasidang_id' => $item->id,
                    'penguji' => 1,
                    'nilai_akhir' => array_sum($request->nilai),
                ]);
                foreach (KomponenPrasidang::all() as $key => $kp) {
                    DetailNilaiPrasidang::create([
                        'nilai_prasidang_id' => $nilai_prasidang->id,
                        'komponen_prasidang_id' => $kp->id,
                        'nilai' => $request->nilai[$key]
                    ]);
                }
            };
            $nilai_total = NilaiPrasidang::where('prasidang_id', $id)->where('penguji', 1)->select('nilai_akhir')->get();
            $nilai_akhir = $nilai_total[0]->nilai_akhir;
            return redirect()->route('backend.dosen.nilai-mahasiswa.prasidang.edit', ['id' => $item->id])->with(['success' => 'Berhasil mengubah data', 'nilai_akhir' => $nilai_akhir]);
        } elseif ($item->penguji2_id == auth()->user()->dosen->id) {
            if ($item->nilai_penguji2 == null) {
                $nilai_prasidang = NilaiPrasidang::create([
                    'prasidang_id' => $item->id,
                    'penguji' => 2,
                    'nilai_akhir' => array_sum($request->nilai),
                ]);
                foreach (KomponenPrasidang::all() as $key => $kp) {
                    DetailNilaiPrasidang::create([
                        'nilai_prasidang_id' => $nilai_prasidang->id,
                        'komponen_prasidang_id' => $kp->id,
                        'nilai' => $request->nilai[$key]
                    ]);
                }
            };
            $nilai_total = NilaiPrasidang::where('prasidang_id', $id)->where('penguji', 2)->select('nilai_akhir')->get();
            $nilai_akhir = $nilai_total[0]->nilai_akhir;
            // dd($nilai_akhir);
            return redirect()->route('backend.dosen.nilai-mahasiswa.prasidang.edit', ['id' => $item->id])->with(['success' => 'Berhasil mengubah data', 'nilai_akhir' => $nilai_akhir]);
        }
    }

    public function updatePrasidang(Request $request, $id)
    {
        $item = Prasidang::find($id);

        if ($item->penguji1_id == auth()->user()->dosen->id) {
            $nilai_prasidang = NilaiPrasidang::wherePrasidangId($id)->wherePenguji(1)->first();
            if ($nilai_prasidang) {
                $nilai_prasidang->update([
                    'file' => MultipartHelper::fileUpload($request->file),
                    'catatan' => $request->catatan,
                    'tanggal_penilaian' => date('Y-m-d H:i:s')
                ]);
            } else {
                NilaiPrasidang::create([
                    'file' => MultipartHelper::fileUpload($request->file),
                    'catatan' => $request->catatan,
                    'tanggal_penilaian' => date('Y-m-d H:i:s'),
                    'prasidang_id' => $item->id,
                    'penguji' => 1
                ]);
            }
            $nilai_total = NilaiPrasidang::where('prasidang_id', $id)->select('nilai_akhir')->get();
            $nilai_akhir = $nilai_total[0]->nilai_akhir;
            return redirect()->route('backend.dosen.nilai-mahasiswa.prasidang.edit', ['id' => $item->id])->with(['success' => 'Berhasil mengubah data', 'nilai_akhir' => $nilai_akhir]);
        } elseif ($item->penguji2_id == auth()->user()->dosen->id) {
            $nilai_prasidang = NilaiPrasidang::wherePrasidangId($id)->wherePenguji(2)->first();
            if ($nilai_prasidang) {
                $nilai_prasidang->update([
                    'file' => MultipartHelper::fileUpload($request->file),
                    'catatan' => $request->catatan,
                    'tanggal_penilaian' => date('Y-m-d H:i:s')
                ]);
            } else {
                NilaiPrasidang::create([
                    'file' => MultipartHelper::fileUpload($request->file),
                    'catatan' => $request->catatan,
                    'tanggal_penilaian' => date('Y-m-d H:i:s'),
                    'prasidang_id' => $item->id,
                    'penguji' => 2
                ]);
            }
            $nilai_total = NilaiPrasidang::where('prasidang_id', $id)->select('nilai_akhir')->get();
            $nilai_akhir = $nilai_total[0]->nilai_akhir;
            return redirect()->route('backend.dosen.nilai-mahasiswa.prasidang.edit', ['id' => $item->id])->with(['success' => 'Berhasil mengubah data', 'nilai_akhir' => $nilai_akhir]);
        }
    }

    public function setNilaiAkhirPrasidang($id)
    {
        $item = Prasidang::find($id);

        $nilai_akhir = ($item->nilai_penguji1->nilai_akhir + $item->nilai_penguji2->nilai_akhir) / 2;
        foreach (NilaiMutu::wherePeriodeId($item->periode_id)->get() as $nm) {
            if ($nilai_akhir >= $nm->nilai_min && $nilai_akhir <= $nm->nilai_maks) {
                $nilai_mutu = $nm->index;
                NilaiPrasidangFinal::create([
                    'prasidang_id' => $item->id,
                    'tanggal' => date('Y-m-d'),
                    'nilai_final' => $nilai_akhir,
                    'nilai_mutu' => $nilai_mutu,
                    'status' => $nilai_akhir > 50 ? 'Lulus' : 'Tidak Lulus',
                ]);
            }
        }
        return redirect()->route('backend.dosen.nilai-mahasiswa.prasidang.edit', ['id' => $item->id])->with('success', 'Berhasil mengubah data');
    }
}
