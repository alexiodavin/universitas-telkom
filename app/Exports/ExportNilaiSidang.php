<?php

namespace App\Exports;

use App\Models\NilaiSidang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportNilaiSidang implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('backend.exports.nilai-sidang', [
            'items' => NilaiSidang::all()
        ]);
    }
}
