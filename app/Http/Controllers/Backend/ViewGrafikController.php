<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Periode;
use App\Models\Mahasiswa;
use App\Models\Proposal;
use App\Models\Prasidang;
use App\Models\Sidang;
use App\Models\KomponenSidang;

class ViewGrafikController extends Controller
{
    public function mahasiswa()
    {
        $result_proposal = [];
        $result_prasidang = [];
        $result_sidang = [];

        foreach (Proposal::all() as $proposal) {
            if ($proposal->nilai_penguji1 && $proposal->nilai_penguji2) {
                $proposal['status'] = 'Sudah Proposal';
                $result_proposal[] = $proposal;
            }
        }
        if (Proposal::count() != 0) {
            $proposal = round((count($result_proposal) / Proposal::count()) * 100);
        } else {
            $proposal = 100;
        }

        foreach (Prasidang::all() as $prasidang) {
            if ($prasidang->nilai_penguji1 && $prasidang->nilai_penguji2) {
                $prasidang['status'] = 'Sudah Prasidang';
                $result_prasidang[] = $prasidang;
            }
        }
        if (Prasidang::count() != 0) {
            $prasidang = round((count($result_prasidang) / Prasidang::count()) * 100);
        } else {
            $prasidang = 1000;
        }

        foreach (Sidang::all() as $sidang) {
            if ($sidang->nilai_penguji1 && $sidang->nilai_penguji2) {
                $sidang['status'] = 'Sudah Sidang';
                $result_sidang[] = $sidang;
            }
        }
        if (Sidang::count() != 0) {
            $sidang = round((count($result_sidang) / Sidang::count()) * 100);
        } else {
            $sidang = 100;
        }

        return view('backend.view-grafik.mahasiswa', [
            'proposal' => $proposal,
            'jumlah_proposal' => count($result_proposal),
            'total_proposal' => Proposal::count(),
            'prasidang' => $prasidang,
            'jumlah_prasidang' => count($result_prasidang),
            'total_prasidang' => Prasidang::count(),
            'sidang' => $sidang,
            'jumlah_sidang' => count($result_sidang),
            'total_sidang' => Sidang::count(),
        ]);
    }

    public function sidangPerAngkatan()
    {
        $data_2019 = 0;
        $data_2020 = 0;
        $data_2021 = 0;
        $data_2022 = 0;

        foreach (Sidang::all() as $sidang) {
            if (date('Y', strtotime($sidang->mahasiswa->created_at)) == 2019) {
                $data_2019++;
            } else if (date('Y', strtotime($sidang->mahasiswa->created_at)) == 2020) {
                $data_2020++;
            } else if (date('Y', strtotime($sidang->mahasiswa->created_at)) == 2021) {
                $data_2021++;
            } else if (date('Y', strtotime($sidang->mahasiswa->created_at)) == 2022) {
                $data_2022++;
            }
        }

        $total_2019 = Mahasiswa::whereYear('created_at', 2019)->count() == 0 ? 1 : Mahasiswa::whereYear('created_at', 2019)->count();
        $total_2020 = Mahasiswa::whereYear('created_at', 2020)->count() == 0 ? 1 : Mahasiswa::whereYear('created_at', 2020)->count();
        $total_2021 = Mahasiswa::whereYear('created_at', 2021)->count() == 0 ? 1 : Mahasiswa::whereYear('created_at', 2021)->count();
        $total_2022 = Mahasiswa::whereYear('created_at', 2022)->count() == 0 ? 1 : Mahasiswa::whereYear('created_at', 2022)->count();

        $sidang_2019 = round($data_2019 / $total_2019) * 100;
        $sidang_2020 = round($data_2020 / $total_2020) * 100;
        $sidang_2021 = round($data_2021 / $total_2021) * 100;
        $sidang_2022 = round($data_2022 / $total_2022) * 100;

        return view('backend.view-grafik.sidang-per-angkatan', [
            'sidang_2019' => $sidang_2019,
            'sidang_2020' => $sidang_2020,
            'sidang_2021' => $sidang_2021,
            'sidang_2022' => $sidang_2022,
        ]);
    }

    public function lulusTepatWaktu()
    {
        $tepat_waktu = 0;
        $tidak_tepat_waktu = 0;
        if (request()->from && request()->to) {
            foreach (Sidang::where('periode_id', 'like', '%' . request()->periode_id . '%')->get() as $sidang) {
                if ($sidang->jadwal_sidang) {
                    if ($sidang->jadwal_sidang->tanggal_sidang >= request()->from && $sidang->jadwal_sidang->tanggal_sidang <= request()->to) {
                        $tanggal_deadline = KomponenSidang::whereProdiId($sidang->mahasiswa->mahasiswa_import->prodi_id)->where('periode_id', 'like', '%' . request()->periode_id . '%')->first()->tanggal_deadline_input_nilai;
                        if ($sidang->nilai_penguji1 && $sidang->nilai_penguji2) {
                            $tepat_waktu++;
                        } else {
                            if ($tanggal_deadline > date('Y-m-d')) {
                                $tepat_waktu++;
                            } else {
                                $tidak_tepat_waktu++;
                            }
                        }
                    }
                }
            }
        } else {
            foreach (Sidang::where('periode_id', 'like', '%' . request()->periode_id . '%')->get() as $sidang) {
                $tanggal_deadline = KomponenSidang::whereProdiId($sidang->mahasiswa->mahasiswa_import->prodi_id)->where('periode_id', 'like', '%' . request()->periode_id . '%')->first()->tanggal_deadline_input_nilai;
                if ($sidang->nilai_penguji1 && $sidang->nilai_penguji2) {
                    $tepat_waktu++;
                } else {
                    if ($tanggal_deadline > date('Y-m-d')) {
                        $tepat_waktu++;
                    } else {
                        $tidak_tepat_waktu++;
                    }
                }
            }
        }
        return view('backend.view-grafik.lulus-tepat-waktu', [
            'periodes' => Periode::all(),
            'tepat_waktu' => $tepat_waktu,
            'tidak_tepat_waktu' => $tidak_tepat_waktu,
        ]);
    }
}
