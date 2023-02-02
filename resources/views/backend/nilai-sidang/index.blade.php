@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Berita Acara & Penilaian Sidang</h1>
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
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Judul</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->judul_indo ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span>Memutuskan Proposal mahasiswa ybs :</span>
                <br>
                <p>
                    <h4>
                        <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            @if($item->nilai_final)
                                @if($item->nilai_final->status == 'Lulus') 
                                    LAYAK DILANJUTKAN 
                                @else
                                    TIDAK LAYAK DILANJUTKAN
                                @endif
                            @endif
                        </b>
                    </h4>
                </p>
                <span>Alasan penguji :</span>
                @if($item->penguji1 && $item->nilai_penguji1)
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $item->penguji1->nama_gelar }} : {{ $item->nilai_penguji1->catatan }}
                @endif
                @if($item->penguji2 && $item->nilai_penguji2)
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $item->penguji2->nama_gelar }} : {{ $item->nilai_penguji2->catatan }}
                @endif
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
                                            <th style="text-align: center; border-top: 2px solid #dee2e6;">Bobot Maksimal</th>
                                            <th style="text-align: center; border-top: 2px solid #dee2e6;">Nilai Penguji 1</th>
                                            <th style="text-align: center; border-top: 2px solid #dee2e6;">Nilai Penguji 2</th>
                                            <th style="text-align: center; border-top: 2px solid #dee2e6;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;">100</td>
                                            <td style="text-align: center;">
                                                @if($item->nilai_penguji1)
                                                    {{ $item->nilai_penguji1->nilai_akhir }}
                                                    <a class="btn btn-sm btn-primary" href="{{ route('backend.mahasiswa.nilai-sidang.penguji1') }}"><i class="fas fa-search"></i></a>
                                                @endif
                                            </td>
                                            <td style="text-align: center;">
                                                @if($item->nilai_penguji2)
                                                    {{ $item->nilai_penguji2->nilai_akhir }}
                                                    {{-- <a class="btn btn-sm btn-primary" href="{{ route('backend.mahasiswa.nilai-sidang.penguji2') }}"><i class="fas fa-search"></i></a> --}}
                                                @endif
                                            </td>
                                            <td style="text-align: center;">
                                                @if($item->nilai_penguji1 && $item->nilai_penguji2)
                                                    {{ $item->nilai_penguji2->nilai_akhir }} <a class="btn btn-sm btn-primary" href="{{ route('backend.mahasiswa.nilai-sidang.penguji') }}"><i class="fas fa-search"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <p><h4><b>Nilai Sidang (Rata-Rata) : @if($item->nilai_final) {{ $item->nilai_final->nilai_final }} ({{ $item->nilai_final->nilai_mutu }}) @endif</b></h4></p>
                <span>Pengesahan Sidang :</span><br>
                @if($item->nilai_penguji1)
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Disetujui Oleh Penguji 1 Pada Tanggal {{ date('d/m/Y', strtotime($item->nilai_penguji1->tanggal_penilaian)) }}</span><br>
                @endif
                @if($item->nilai_penguji2)
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Disetujui Oleh Penguji 2 Pada Tanggal {{ date('d/m/Y', strtotime($item->nilai_penguji2->tanggal_penilaian)) }}</span><br>
                @endif
                {{-- <br>
                <a href="" class="btn btn-primary">Download Dokumen Sidang</a> --}}
                <hr>
                <button class="btn btn-primary print">Print</button>
            </div>
        </section>
    </div>
@endsection