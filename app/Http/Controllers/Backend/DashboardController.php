<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Multipart;
use App\Models\User;
use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Mahasiswa;

class DashboardController extends Controller
{
    public function dashboard(){
        session(['role_dosen' => null]);
        return view('backend.dashboard', [

        ]);
    }

    public function indexProfile(){
        session(['role_dosen' => null]);
        return view('backend.profile');
    }

    public function UpdateProfile(Request $request){
        if(auth()->user()->role_id == IS_ADMIN){
            $item = Admin::whereUserId(auth()->id())->first();
        }elseif(auth()->user()->role_id == IS_DOSEN){
            $item = Dosen::whereUserId(auth()->id())->first();
        }elseif(auth()->user()->role_id == IS_MAHASISWA){
            $item = Mahasiswa::whereUserId(auth()->id())->first();
        }
        $data = $request->all();
        $data['password'] = $request->password ? bcrypt($request->password) : $item->password;
        $data['foto'] = $request->foto ? Multipart::userUpload($request->foto) : $item->foto;
        $item->update($data);
        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
