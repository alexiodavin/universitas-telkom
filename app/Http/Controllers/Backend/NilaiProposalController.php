<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Proposal;

class NilaiProposalController extends Controller
{
    public function index()
    {
        $proposal = Proposal::whereMahasiswaId(auth()->user()->mahasiswa->id)->first();
        if ($proposal == null) {
            return redirect()->back()->with('warning', 'Data belum tersedia');
        }
        return view('backend.nilai-proposal.index', [
            'item' => $proposal
        ]);
    }

    public function penguji()
    {
        return view('backend.nilai-proposal.penguji', [
            'item' => Proposal::whereMahasiswaId(auth()->user()->mahasiswa->id)->first(),
        ]);
    }
    public function penguji1()
    {
        return view('backend.nilai-proposal.penguji1', [
            'item' => Proposal::whereMahasiswaId(auth()->user()->mahasiswa->id)->first(),
        ]);
    }

    public function penguji2()
    {
        return view('backend.nilai-proposal.penguji2', [
            'item' => Proposal::whereMahasiswaId(auth()->user()->mahasiswa->id)->first(),
        ]);
    }

    public function print()
    {
        return view('backend.nilai-proposal.print', [
            'item' => Proposal::whereMahasiswaId(auth()->user()->mahasiswa->id)->first(),
        ]);
    }
}
