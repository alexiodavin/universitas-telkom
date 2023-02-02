<?php

namespace App\Exports;

use App\Models\NilaiPrasidang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportNilaiPrasidang implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('backend.exports.nilai-prasidang', [
            'items' => NilaiPrasidang::all()
        ]);
    }
}
