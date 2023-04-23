<?php

namespace App\Http\Controllers\Backend;

use App\Models\Sidang;
use App\Models\Proposal;

use App\Models\Prasidang;
use Illuminate\Http\Request;
use App\Models\KomponenSidang;
use App\Models\KomponenProposal;
use App\Models\NilaiSidangFinal;
use App\Models\KomponenPrasidang;
use App\Models\NilaiProposalFinal;
use Illuminate\Support\Facades\DB;
use App\Models\NilaiPrasidangFinal;
use App\Http\Controllers\Controller;
use App\Models\NilaiProposal;

class DaftarMahasiswaController extends Controller
{
    public function index()
    {
        session(['role_dosen' => 'wali']);
        return view('backend.daftar-mahasiswa.index');
    }

    public function bimbingan()
    {
        session(['role_dosen' => 'pembimbing']);


        $items = [];
        $nilai_proposal_final = NilaiProposalFinal::all();
        $nilai_prasidang_final = NilaiPrasidangFinal::all();
        $nilai_sidang_final = NilaiSidangFinal::all();
        // dd($nilai_proposal_final);



        foreach ($nilai_proposal_final as $nilai_proposal) {
            if ($nilai_proposal->proposal->pembimbing1_id == auth()->user()->dosen->id || $nilai_proposal->proposal->pembimbing2_id == auth()->user()->dosen->id || $nilai_proposal->proposal->penguji1_id == auth()->user()->dosen->id || $nilai_proposal->proposal->penguji1_id == auth()->user()->dosen->id) {
                $nilai_proposal['tipe'] = 'Proposal';
                array_push($items, $nilai_proposal);
            }
        }

        foreach ($nilai_prasidang_final as $nilai_prasidang) {
            if ($nilai_prasidang->prasidang->pembimbing1_id == auth()->user()->dosen->id || $nilai_prasidang->prasidang->pembimbing2_id == auth()->user()->dosen->id || $nilai_prasidang->prasidang->penguji1_id == auth()->user()->dosen->id || $nilai_prasidang->prasidang->penguji1_id == auth()->user()->dosen->id) {
                $nilai_prasidang['tipe'] = 'Prasidang';
                array_push($items, $nilai_prasidang);
            }
        }
        foreach ($nilai_sidang_final as $nilai_sidang) {
            if ($nilai_sidang->sidang->pembimbing1_id == auth()->user()->dosen->id || $nilai_sidang->sidang->pembimbing2_id == auth()->user()->dosen->id || $nilai_sidang->sidang->penguji1_id == auth()->user()->dosen->id || $nilai_sidang->sidang->penguji1_id == auth()->user()->dosen->id) {
                $nilai_sidang['tipe'] = 'Prasidang';
                array_push($items, $nilai_sidang);
            }
        }

        // dd($items);




        // $nilai_proposal_final = DB::table('nilai_proposal_final')
        //     ->join('proposal', 'proposal.id', '=', 'nilai_proposal_final.proposal_id')
        //     ->join('mahasiswa', 'proposal.mahasiswa_id', '=', 'mahasiswa.id')
        //     ->select('mahasiswa.nama','mahasiswa.nim', 'proposal.judul_indo', 'proposal.judul_inggris', 'proposal.pembimbing1_id', 'proposal.pembimbing2_id', 'proposal.penguji1_id', 'proposal.penguji2_id')
        //     ->where('proposal.pembimbing1_id','=', auth()->user()->dosen->id)
        //     ->orWhere('proposal.pembimbing2_id','=', auth()->user()->dosen->id)
        //     ->get();

        //     // dd($nilai_proposal_final);

        //     foreach ($nilai_proposal_final as $value) {
        //         // dd($value);
        //         $value->tipe = 'Proposal';
        //         // array_push($value, 'Proposal');
        //         array_push($items, $value);
        //     }


        //     $nilai_prasidang_final = DB::table('nilai_prasidang_final')
        //     ->join('prasidang', 'prasidang.id', '=', 'nilai_prasidang_final.prasidang_id')
        //     ->join('mahasiswa', 'prasidang.mahasiswa_id', '=', 'mahasiswa.id')
        //     ->select('mahasiswa.nama','mahasiswa.nim', 'prasidang.judul_indo', 'prasidang.judul_inggris', 'prasidang.pembimbing1_id', 'prasidang.pembimbing2_id', 'prasidang.penguji1_id', 'prasidang.penguji2_id')
        //     ->where('prasidang.pembimbing1_id','=', auth()->user()->dosen->id)
        //     ->orWhere('prasidang.pembimbing2_id','=', auth()->user()->dosen->id)
        //     ->get();

        //     foreach ($nilai_prasidang_final as $value) {
        //         $value->tipe = 'Prasidang';
        //         array_push($items, $value);
        //     }

        //     $nilai_sidang_final = DB::table('nilai_sidang_final')
        //     ->join('sidang', 'sidang.id', '=', 'nilai_sidang_final.sidang_id')
        //     ->join('mahasiswa', 'sidang.mahasiswa_id', '=', 'mahasiswa.id')
        //     ->select('mahasiswa.nama','mahasiswa.nim', 'sidang.judul_indo', 'sidang.judul_inggris', 'sidang.pembimbing1_id', 'sidang.pembimbing2_id', 'sidang.penguji1_id', 'sidang.penguji2_id')
        //     ->where('sidang.pembimbing1_id','=', auth()->user()->dosen->id)
        //     ->orWhere('sidang.pembimbing2_id','=', auth()->user()->dosen->id)
        //     ->get();

        //     foreach ($nilai_sidang_final as $value) {
        //         $value->tipe = 'Sidang';
        //         array_push($items, $value);
        //     }
        // dd($items);
        // $nilai_prasidang_final = DB::table('nilai_prasidang_final')
        //     ->join('prasidang', 'prasidang.id', '=', 'nilai_prasidang_final.prasidang_id')
        //     ->join('mahasiswa', 'prasidang.mahasiswa_id', '=', 'mahasiswa.id')
        //     ->select('mahasiswa.nama','mahasiswa.nim', 'prasidang.judul_indo', 'prasidang.judul_inggris', 'prasidang.pembimbing1_id', 'prasidang.pembimbing2_id', 'prasidang.penguji1_id', 'prasidang.penguji2_id')
        //     ->get();

        // $nilai_sidang_final = DB::table('nilai_sidang_final')
        //     ->join('sidang', 'sidang.id', '=', 'nilai_sidang_final.sidang_id')
        //     ->join('mahasiswa', 'sidang.mahasiswa_id', '=', 'mahasiswa.id')
        //     ->select('mahasiswa.nama','mahasiswa.nim', 'sidang.judul_indo', 'sidang.judul_inggris', 'sidang.pembimbing1_id', 'sidang.pembimbing2_id', 'sidang.penguji1_id', 'sidang.penguji2_id')
        //     ->get();

        // dd($nilai_sidang_final);


        // $dosens = DB::table('dosen')
        //     ->select('*')
        //     ->get();

        // dd();

        return view('backend.daftar-mahasiswa.bimbingan', [
            'items' => $items
            // 'dosen' => $dosens
        ]);
    }

    public function sidang()
    {
        session(['role_dosen' => 'wali']);

        $items = [];
        foreach (Proposal::where('pembimbing1_id', auth()->user()->dosen->id)->orWhere('pembimbing2_id', auth()->user()->dosen->id)->get() as $proposal) {
            $proposal['tipe'] = 'Proposal';
            $items[] = $proposal;
        }
        foreach (Prasidang::where('pembimbing1_id', auth()->user()->dosen->id)->orWhere('pembimbing2_id', auth()->user()->dosen->id)->get() as $prasidang) {
            $prasidang['tipe'] = 'Prasidang';
            $items[] = $prasidang;
        }
        foreach (Sidang::where('pembimbing1_id', auth()->user()->dosen->id)->orWhere('pembimbing2_id', auth()->user()->dosen->id)->get() as $sidang) {
            $sidang['tipe'] = 'Sidang';
            $items[] = $sidang;
        }

        return view('backend.daftar-mahasiswa.sidang', [
            'items' => $items
        ]);
    }
}
