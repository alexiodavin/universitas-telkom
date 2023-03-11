<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CurrentSemester;

class CurrentSemesterController extends Controller
{
    public function index()
    {
    }
    public function update(Request $request, CurrentSemester $current_semester)
    {
        $data = $request->validate(
            [
                'tahun_ajaran' => 'required',
                'semester' => 'required',
            ]
        );
        $current_semester->update($data);
        return back()->with('success', 'Berhasil mengubah Semester');
    }
}
