<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class MultipartHelper
{
    static function userUpload($file)
    {
        $file_name = date('YmdHis').'-'.time().'-'.Str::random(50).'.'.$file->getClientOriginalExtension();
        $file->move(public_path('photo/user/'), $file_name);
        return $file_name;
    }

    static function videoUpload($file)
    {
        $file_name = date('YmdHis').'-'.time().'-'.Str::random(50).'.'.$file->getClientOriginalExtension();
        $file->move(public_path('video/'), $file_name);
        return $file_name;
    }

    static function fileUpload($file)
    {
        $file_name = date('YmdHis').'-'.time().'-'.Str::random(50).'.'.$file->getClientOriginalExtension();
        $file->move(public_path('file/'), $file_name);
        return $file_name;
    }
}