@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">Input Komponen Nilai Prasidang (Tahap 2)</h1>
            </div>
        </div>

        <section class="content ml-4 mr-4 mb-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Kode Koordinator </label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ auth()->user()->dosen->kode }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Nama Koordinator PA</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ auth()->user()->dosen->nama }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Program Studi</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ auth()->user()->prodi->nama }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Semester</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ auth()->user()->prodi->periode->semester }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Tahun Ajaran</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ auth()->user()->prodi->periode->tahun_ajaran }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content ml-4 mr-4 mb-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <form action="{{ route('backend.koordinator-pa.komponen-nilai.prasidang.update-deadline') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Periode <span style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="periode_id" class="form-control" required id="periode_id">
                                                @foreach ($periodes as $periode)
                                                    <option value="{{ $periode->id }}" @if($periode_id == $periode->id) selected @endif>{{ $periode->tahun_ajaran }} - {{ $periode->semester }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Tanggal Deadline Input Nilai <span style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="date" name="tanggal_deadline_input_nilai" class="form-control" value="{{ $deadline_prasidang->deadline ?? '' }}" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content ml-4 mr-4 mb-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                {{-- <div class="form-group row">
                                    <label class="col-sm-1 col-form-label font-weight-bold">Periode </label>
                                    <div class="col-sm-10">
                                        <select class="form-control col-sm-2" id="periode_id" >
                                            @foreach ($periodes as $periode)
                                                <option value="{{ $periode->id }}" @if($periode_id == $periode->id) selected @endif>{{ $periode->tahun_ajaran }} - {{ $periode->semester }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                <table class="table table-hover border" style="width: 100%; border: 0; ">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; width: 100px;">No KN</th>
                                            <th style="text-align: center; border-left: 2px solid #dee2e6;">Nama</th>
                                            <th style="text-align: center; border-left: 2px solid #dee2e6; width: 500px;">Nilai Maksimal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($komponen_prasidangs as $kn)
                                            <tr>
                                                <td style="border-right: 2px solid #dee2e6;">KN {{ $no++ }}</td>
                                                <td style="border-right: 2px solid #dee2e6;">{{ $kn->nama_komponen }}</td>
                                                <td style="border-right: 2px solid #dee2e6; text-align: center;">{{ $kn->persentase }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3">
                                                <center>
                                                    <b>Total Nilai : {{ $total_komponen_prasidang }}</b>
                                                    @if ($total_komponen_prasidang < 100)
                                                        <b style="color: #d9534f"> Nilai Belum 100</b>
                                                    @endif
                                                </center>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    + Tambah Data
                </button>

                <a href="{{ route('backend.koordinator-pa.komponen-nilai.prasidang.edit', ['periode_id' => $periode_id]) }}" class="btn btn-primary float-right">Edit Nilai</a>
                <a href="{{ route('backend.koordinator-pa.komponen-nilai.prasidang.upload') }}" class="btn btn-primary float-right mr-2">Upload</a>
            </div>
        </section>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Komponen Nilai Prasidang (Tahap 2)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('backend.koordinator-pa.komponen-nilai.prasidang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="periode_id" value="{{ $periode_id }}">

                        <label>Nomor KN</label>
                        <input type="number" class="form-control" value="{{ $no }}" readonly>
                        
                        <label>Nama Komponen Nilai</label>
                        <input type="text" class="form-control" name="nama_komponen" required>
    
                        <label>Nilai Maksimal</label>
                        <input type="number" class="form-control" name="persentase" required>

                        {{-- <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="5" required></textarea> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#periode_id').on('change', function() {
            return window.location.href = "{{ url('koordinator-pa/komponen-nilai/prasidang/list') }}/"+this.value
        });
    </script>
@endsection