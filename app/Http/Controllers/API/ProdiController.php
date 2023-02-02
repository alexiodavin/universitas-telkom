<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Prodi;

class ProdiController extends Controller
{
    public function find(){
        return $this->responseSuccess(Prodi::find(request()->id));
    }
}
