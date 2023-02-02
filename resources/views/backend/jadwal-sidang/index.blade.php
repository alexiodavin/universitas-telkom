@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Sidang</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content ml-4 mr-4">
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
                                <label class="col-sm-2 col-form-label font-weight-bold">Judul TA / PA</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->judul_indo }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Title</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->judul_inggris }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Program Studi</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ auth()->user()->prodi->nama }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Tanggal & Jam</label>
                                    <div class="col-sm-10">
                                        @if($item->jadwal_sidang)
                                            <span class="form-control-plaintext">: {{ date('d/m/Y H:i', strtotime($item->jadwal_sidang->tanggal_sidang)) }} WIB</span>
                                        @else
                                            <span class="form-control-plaintext">: -</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Ruangan</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: 
                                            @if($item->jadwal_sidang)
                                                @if ($item->jadwal_sidang->ruangan_id)
                                                    Offline
                                                @else
                                                    Online
                                                @endif
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Pembimbing 1</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->pembimbing1->nama_gelar }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Pembimbing 2</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->pembimbing2->nama_gelar }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Penguji 1</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->penguji1->nama_gelar }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Penguji 2</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->penguji2->nama_gelar }}</span>
                                    </div>
                                </div>
                                @if($item->jadwal_sidang)
                                    @if (isset($item->jadwal_sidang->ruangan_sidang))
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Ruangan Sidang</label>
                                            <div class="col-sm-10">
                                                <span class="form-control-plaintext">: {{ $item->jadwal_sidang->ruangan_sidang->nama }}</span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Link Zoom</label>
                                            <div class="col-sm-10">
                                                <span class="form-control-plaintext">: <a target="_blank" href="{{ $item->jadwal_sidang->ruangan }}">{{ $item->jadwal_sidang->ruangan }}</a></span>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Ruangan Sidang / Link Zoom</label>
                                        <div class="col-sm-10">
                                            <span class="form-control-plaintext">: -</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection