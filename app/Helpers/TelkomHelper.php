<?php


namespace App\Helpers;

use Illuminate\Support\Str;
use App\Models\CurrentSemester;


if (!function_exists("list_bulan")) {
    function listBulan()
    {
        $bulan = [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember",
        ];
        return $bulan;
    }
}

if (!function_exists("tahunAjaran")) {
    function tahunAjaran()
    {
        return CurrentSemester::find(1)->tahun_ajaran;
    }
}
if (!function_exists("semester")) {
    function semester()
    {
        return CurrentSemester::find(1)->semester;
    }
}
