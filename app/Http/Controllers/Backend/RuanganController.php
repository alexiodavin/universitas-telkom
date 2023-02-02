<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ruangan;

class RuanganController extends Controller
{
    public function index()
    {
        return view('backend.ruangan.index', [
            'items' => Ruangan::orderBy('id', 'DESC')->get(),
        ]);
    }

    public function create()
    {
        return view('backend.ruangan.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'unique:ruangan',
        ]);

        $data = $request->all();
        Ruangan::create($data);
        return redirect()->route('backend.admin.ruangan')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        return view('backend.ruangan.edit', [
            'item' => Ruangan::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = Ruangan::find($id);
        $data = $request->all();
        if (!isset($request->is_active)) {
            $data['is_active'] = 0;
        }
        Ruangan::find($id)->update($data);
        return redirect()->route('backend.admin.ruangan')->with('success', 'Berhasil mengubah data');
    }

    public function delete($id)
    {
        $item = Ruangan::find($id);
        $item->delete();
        return redirect()->route('backend.admin.ruangan')->with('success', 'Berhasil menghapus data');
    }
}
