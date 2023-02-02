<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Proposal;
use App\Models\Prasidang;
use App\Models\Sidang;
use App\Models\HistoriJudulProposal;
use App\Models\HistoriJudulPrasidang;

class TAController extends Controller
{
    public function index()
    {
        $item = null;
        $tipe = null;
        $proposal = Proposal::whereMahasiswaId(auth()->user()->mahasiswa->id)->first();
        $prasidang = Prasidang::whereMahasiswaId(auth()->user()->mahasiswa->id)->first();
        $sidang = Sidang::whereMahasiswaId(auth()->user()->mahasiswa->id)->first();
        if ($sidang) {
            $item = $sidang;
            $tipe = 'sidang';
        } elseif ($prasidang) {
            $item = $prasidang;
            $tipe = 'prasidang';
        } elseif ($proposal) {
            $item = $proposal;
            $tipe = 'proposal';
        } else {
            return redirect()->back()->with('warning', 'Data belum tersedia');
        }
        return view('backend.ta.index', [
            'item' => $item,
            'tipe' => $tipe
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $proposal = Proposal::whereMahasiswaId(auth()->user()->mahasiswa->id)->first();
        if ($proposal) {
            HistoriJudulProposal::create([
                'proposal_id' => $proposal->id,
                'judul_indo_lama' => $proposal->judul_indo,
                'judul_indo_baru' => $request->judul_indo,
                'judul_inggris_lama' => $proposal->judul_inggris,
                'judul_inggris_baru' => $request->judul_inggris,
                'aksi' => 'update'
            ]);
            $proposal->update($data);
        }
        $prasidang = Prasidang::whereMahasiswaId(auth()->user()->mahasiswa->id)->first();
        if ($prasidang) {
            HistoriJudulPrasidang::create([
                'prasidang_id' => $prasidang->id,
                'judul_indo_lama' => $prasidang->judul_indo,
                'judul_indo_baru' => $request->judul_indo,
                'judul_inggris_lama' => $prasidang->judul_inggris,
                'judul_inggris_baru' => $request->judul_inggris,
                'aksi' => 'update'
            ]);
            $prasidang->update($data);
        }
        $sidang = Sidang::whereMahasiswaId(auth()->user()->mahasiswa->id)->first();
        if ($sidang) {
            $sidang->update($data);
        }
        return redirect()->route('backend.mahasiswa.ta')->with('success', 'Berhasil mengubah data');
    }

    public function histori()
    {
        $proposal = Proposal::whereMahasiswaId(auth()->user()->mahasiswa->id)->first();
        $prasidang = Prasidang::whereMahasiswaId(auth()->user()->mahasiswa->id)->first();
        if ($proposal) {
            $histori_proposal = HistoriJudulProposal::where('proposal_id', $proposal->id)->get();
        } else {
            $histori_proposal = [];
        }
        if ($prasidang) {
            $histori_prasidang = HistoriJudulPrasidang::where('prasidang_id', $prasidang->id)->get();
        } else {
            $histori_prasidang = [];
        }
        return view('backend.ta.histori', [
            'histori_proposal' => $histori_proposal,
            'histori_prasidang' => $histori_prasidang
        ]);
    }
}
