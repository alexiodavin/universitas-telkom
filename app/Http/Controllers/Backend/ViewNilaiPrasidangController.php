<?php

namespace App\Http\Controllers\Backend;

use App\Models\Periode;
use Illuminate\Http\Request;
use App\Models\NilaiPrasidang;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportNilaiPrasidang;

class ViewNilaiPrasidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){

            $array_nilai_prasidang = NilaiPrasidang::all();
            $items = [];
            foreach($array_nilai_prasidang as $value){
                if($value->prasidang->periode->id == $request->periode_id){
                    array_push($items, $value);
                }
            }
            // dd($items);
            return response()->json(['items' => $items]);
         }

        $items = NilaiPrasidang::all();
        $periodes = Periode::all();
        
        return view('backend.view-nilai.Prasidang', [
            'items' => $items,
            'periodes' => $periodes,
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
        return Excel::download(new ExportNilaiPrasidang, 'nilaiPrasidang.xlsx');
    }
}
