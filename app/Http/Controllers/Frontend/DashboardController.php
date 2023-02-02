<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Mail;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('frontend.dashboard');
    }

    public function forgotPassword(){
        return view('auth.forgot-password');
    }

    public function storeForgotPassword(Request $request){
        if(User::whereEmail($request->email)->first()){
            $password = strtoupper(Str::random(6));
            User::whereEmail($request->email)->first()->update([
                'password' => bcrypt($password)
            ]);
            Mail::send('forgot-password', ['password' => $password],
                function ($message) use ($request){
                    $message->subject('[FORGOT PASSWORD]');
                    $message->from(env('MAIL_USERNAME'), 'Telkom University');
                    $message->to($request->email);
                }
            );
            return redirect()->back()->with('success', 'Password baru telah dikirim ke email anda, silahkan untuk mengeceknya');
        }else{
            return redirect()->back()->with('warning', 'Email tidak terdaftar');
        }
    }
}
