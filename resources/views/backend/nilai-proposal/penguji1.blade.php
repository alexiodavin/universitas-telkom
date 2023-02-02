@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <center>
                    <h1 class="m-0 text-dark">Komponen Nilai Proposal</h1>
                </center>
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
                                        <span class="form-control-plaintext">: {{ $item->judul_indo }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Penguji 1</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->penguji1->nama_gelar }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Diperiksa Pada Waktu, Tanggal</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ date('d/m/Y H:i', strtotime($item->nilai_penguji1->tanggal_penilaian)) }} WIB</span>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body table-responsive">
                                <table class="table table-bordered" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="border-top: 2px solid #dee2e6;">Nama Komponen Nilai</th>
                                            <th style="text-align: center; border-top: 2px solid #dee2e6;">Nilai Maksimal</th>
                                            <th style="text-align: center; border-top: 2px solid #dee2e6;">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($item->nilai_penguji1->detail_nilai as $detail_nilai)
                                            <tr>
                                                <td>{{ $detail_nilai->komponen_proposal->nama_komponen }}</td>
                                                <td style="text-align: center;">{{ $detail_nilai->komponen_proposal->persentase }}</td>
                                                <td style="text-align: center;">{{ $detail_nilai->nilai }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <button class="btn btn-primary" style="width: 100%; cursor: default;">Total Nilai {{ $item->nilai_final->nilai_final }}</button>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-4">
                                        <b>Catatan Revisi : {{ $item->nilai_penguji1->catatan }}</b>
                                    </div>
                                    <div class="col-4">
                                        <b>Nilai Mutu : 
                                            @if ($item->nilai_final->nilai_final >= 80)
                                                A
                                            @elseif($item->nilai_final->nilai_final >= 70 && $item->nilai_final->nilai_final < 80)
                                                AB
                                            @elseif($item->nilai_final->nilai_final >= 65 && $item->nilai_final->nilai_final < 70)
                                                B
                                            @elseif($item->nilai_final->nilai_final >= 60 && $item->nilai_final->nilai_final < 65)
                                                BC
                                            @elseif($item->nilai_final->nilai_final >= 50 && $item->nilai_final->nilai_final < 60)
                                                C
                                            @elseif($item->nilai_final->nilai_final >= 40 && $item->nilai_final->nilai_final < 50)
                                                D
                                            @elseif($item->nilai_final->nilai_final >= 0 && $item->nilai_final->nilai_final < 40)
                                                E
                                            @endif
                                        </b>
                                    </div>
                                    <div class="col-4">
                                         <b>Status : {{ $item->nilai_final->nilai_final > 50 ? 'Lulus' : 'Tidak Lulus' }}</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection