<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Proposal;

class ProposalController extends Controller
{
    public function findByMahasiswaId(){
        return $this->responseSuccess(Proposal::whereMahasiswaId(request()->id)->first());
    }
}
