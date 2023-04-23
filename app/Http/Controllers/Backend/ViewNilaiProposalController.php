<?php

namespace App\Http\Controllers\Backend;

use App\Exports\ExportNilaiProposal;
use App\Models\Periode;
use Illuminate\Http\Request;
use App\Models\NilaiProposal;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ViewNilaiProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $array_nilai_proposal = NilaiProposal::all();
            $items = [];
            foreach ($array_nilai_proposal as $value) {
                if ($value->proposal->periode->id == $request->periode_id) {
                    array_push($items, $value);
                }
            }
            return response()->json(['items' => $items]);
        }

        $items = NilaiProposal::all();
        $periodes = Periode::all();

        return view('backend.view-nilai.proposal', [
            'items' => $items,
            // 'periodes' => $periodes,
            'periodes' => Periode::where('jenis_periode', 'Proposal')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function download()
    {
        return Excel::download(new ExportNilaiProposal, 'nilaiProposal.xlsx');
    }
}
