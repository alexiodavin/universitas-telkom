<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Prasidang;

class PrasidangController extends Controller
{
    public function findByMahasiswaId(){
        return $this->responseSuccess(Prasidang::whereMahasiswaId(request()->id)->first());
    }
}
