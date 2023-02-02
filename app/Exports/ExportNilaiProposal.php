<?php

namespace App\Exports;

use App\Models\NilaiProposal;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportNilaiProposal implements FromView
{
    public function view(): View
    {
        return view('backend.exports.nilai-proposal', [
            'items' => NilaiProposal::all()
        ]);
    }
}
