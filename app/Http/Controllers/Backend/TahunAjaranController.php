<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TahunAjaran;


class TahunAjaranController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
        # code...
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        TahunAjaran::create($data);
        return redirect()->back()->with('success', 'Berhasil menambahkan data');
    }
    
    public function update(Request $request, $id)
    {
        $data = $request->all();
        TahunAjaran::find($id)->update($data);
        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }
}
