@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Berita Acara & Penilaian Madusem</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content ml-4 mr-4 mb-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Nama Mahasiswa</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ auth()->user()->mahasiswa->nama }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">NIM</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ auth()->user()->mahasiswa->nim }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <span>Nama Pembimbing Akademik :</span>
                        @if ($madusem->pbb_1_id && $madusem->pbb_2_id)
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            1. {{ $pbb1Name }}
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            2. {{ $pbb2Name }}
                        @endif
                    </div>
                    <div class="col-6">
                        <span>Nama Penguji :</span>
                        @if ($madusem->puj_1_id && $madusem->puj_2_id)
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            1. {{ $puj1Name }}
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            2. {{ $puj2Name }}
                        @endif
                    </div>
                </div>

                <br>
                <br>
                <span>Penilaian :</span>
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body table-responsive">
                                <table class="table table-bordered" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; border-top: 2px solid #dee2e6;">Bobot Maksimal
                                            </th>
                                            @foreach ($komponenNilai as $nilai)
                                                <th style="text-align: center; border-top: 2px solid #dee2e6;">
                                                    {{ $nilai->nama_komponen }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalNilai = 0; // Inisialisasi variabel totalNilai
                                        @endphp
                                        <tr>
                                            <td style="text-align: center;">100</td>
                                            @foreach ($komponenNilai as $nilai)
                                                <td style="text-align: center;">
                                                    @php
                                                        $nilaiColumn = 'nilai_' . $nilai->nama_komponen;
                                                        $nilaiValue =
                                                            $madusem
                                                                ->komponenMadusemPivots()
                                                                ->where('komponen_madusem_id', $nilai->id)
                                                                ->first()->nilai_komponen ?? 0;

                                                        // Menambahkan nilai ke totalNilai
                                                        $totalNilai += $nilaiValue;
                                                    @endphp

                                                    {{ $nilaiValue }}
                                                </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $totalNilai;
                    $grades = [[80, 'A'], [70, 'AB'], [65, 'B'], [60, 'BC'], [50, 'C'], [40, 'D'], [0, 'E']];

                    $totalNilai = max(0, min(100, $totalNilai));

                    $letterGrade = null;
                    foreach ($grades as $grade) {
                        if ($totalNilai >= $grade[0]) {
                            $letterGrade = $grade[1];
                            break;
                        }
                    }

                @endphp
                <h4>
                    <b>Nilai Magang :{{ $totalNilai }} ({{ $letterGrade ?? 'Tidak Tersedia' }}) </b>
                </h4>
                </p>
                <hr>

                <div class="col-6">
                        <a href="{{ route('backend.mahasiswa.nilai-madusem.print') }}" class="btn btn-primary print">Print</a>
                    </div>
                <div class="col-12">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Deadline Pengumpulan:</td>
                                <td>{{ \Carbon\Carbon::parse($madusem->tanggal_selesai)->format('d M Y') }}</td>
                            </tr>
                            <tr>
                                <td>Catatan Revisi:</td>
                                <td>{{ $madusem->keterangan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
