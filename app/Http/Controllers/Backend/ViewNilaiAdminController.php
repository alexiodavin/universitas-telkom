<?php

namespace App\Http\Controllers\Backend;


use App\Models\Sidang;
use App\Models\Periode;
use App\Models\Proposal;
use App\Models\Prasidang;
use App\Models\NilaiSidang;
use Illuminate\Http\Request;
use App\Models\NilaiProposal;
use App\Models\NilaiPrasidang;
use App\Http\Controllers\Controller;

class ViewNilaiAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if($request->ajax()){
            // dd($request->all());
            if($request->proposal_id){
                $changed_data = Proposal::where('id', $request->proposal_id)->update([
                    'periode_id' => $request->periode_id,
                    'tahun_ajaran' => Periode::where('id', $request->periode_id)->first()->pluck('tahun_ajaran'),
                    'semester' => Periode::where('id', $request->periode_id)->first()->pluck('semester'),
                ]);
            }
            elseif($request->prasidang_id){
                $changed_data = Prasidang::where('id', $request->prasidang_id)->update([
                    'periode_id' => $request->periode_id,
                    'tahun_ajaran' => Periode::where('id', $request->periode_id)->first()->pluck('tahun_ajaran'),
                    'semester' => Periode::where('id', $request->periode_id)->first()->pluck('semester'),
                ]);
            }
            else{
                $changed_data = Sidang::where('id', $request->sidang_id)->update([
                    'periode_id' => $request->periode_id,
                    'tahun_ajaran' => Periode::where('id', $request->periode_id)->first()->pluck('tahun_ajaran'),
                    'semester' => Periode::where('id', $request->periode_id)->first()->pluck('semester'),
                ]);
            }
            return response()->json('Periode berhasil diubah');
         }

        $items = [];
        $proposal_data = NilaiProposal::all();
        foreach ($proposal_data as $key => $data) {
            $data['jenis'] = 'Proposal';
            array_push($items, $data);
        }
        $prasidang_data = NilaiPrasidang::all();
        foreach ($prasidang_data as $key => $data) {
            $data['jenis'] = 'Prasidang';
            array_push($items, $data);
        }
        $sidang_data = NilaiSidang::all();
        foreach ($sidang_data as $key => $data) {
            $data['jenis'] = 'Sidang';
            array_push($items, $data);
        }
        // dd($items);

        $periodes = Periode::all();


        return view('backend.view-nilai.mahasiswa', compact('items', 'periodes'));
        
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
}
