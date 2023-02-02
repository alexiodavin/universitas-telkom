@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Mahasiswa</h1>
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
                                <form action="{{ route('backend.mahasiswa.ta.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
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
                                    <label class="col-sm-2 col-form-label font-weight-bold">Judul TA / PA (Bahasa)<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10 row">
                                            <input type="text" name="judul_indo" class="form-control judul-1 ml-2" value="{{ $item->judul_indo }}" style="width: 90%;" readonly> @if($tipe != 'sidang') <i onclick="editable1()" class="btn btn-primary fa fa-edit"></i> @endif
                                            @if ($errors->has('judul_indo'))
                                                <span style="color:red;">{{ $errors->first('judul_indo') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Final Task Title (English)<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10 row">
                                            <input type="text" name="judul_inggris" class="form-control judul-2 ml-2" value="{{ $item->judul_inggris }}" style="width: 90%;" readonly> @if($tipe != 'sidang') <i onclick="editable2()" class="btn btn-primary fa fa-edit"></i> @endif
                                            @if ($errors->has('judul_inggris'))
                                                <span style="color:red;">{{ $errors->first('judul_inggris') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Program Studi</label>
                                        <div class="col-sm-10">
                                            <span class="form-control-plaintext">: {{ auth()->user()->prodi->nama }}</span>
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
                                <button type="submit" class="btn btn-primary btn-save shadow bg-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        function editable1(){
            $(".judul-1").removeAttr('readonly');
        }
        function editable2(){
            $(".judul-2").removeAttr('readonly');
        }
    </script>
@endsection