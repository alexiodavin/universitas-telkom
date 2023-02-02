@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">Edit Daftar Mahasiswa (Sidang) </h1>
            </div>
        </div>

        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <form action="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.sidang.update', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Periode<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select name="periode_id" class="form-control" required>
                                                <option value="">Pilih Periode</option>
                                                @foreach ($periodes as $periode)
                                                    <option value="{{ $periode->id }}" @if($item->periode_id == $periode->id) selected @endif>{{ $periode->tahun_ajaran }} - {{ $periode->semester }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('periode_id'))
                                                <span style="color:red;">{{ $errors->first('periode_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Nama Mahasiswa<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select name="mahasiswa_id" class="form-control" required>
                                                <option value="">Pilih Nama Mahasiswa</option>
                                                @foreach ($mahasiswas as $mahasiswa)
                                                    <option value="{{ $mahasiswa->id }}" @if($item->mahasiswa_id == $mahasiswa->id) selected @endif>{{ $mahasiswa->nama }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('mahasiswa_id'))
                                                <span style="color:red;">{{ $errors->first('mahasiswa_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Judul PA<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="judul_indo" value="{{ $item->judul_indo }}" required>
                                            @if ($errors->has('judul_indo'))
                                                <span style="color:red;">{{ $errors->first('judul_indo') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Title<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="judul_inggris" value="{{ $item->judul_inggris }}" required>
                                            @if ($errors->has('judul_inggris'))
                                                <span style="color:red;">{{ $errors->first('judul_inggris') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Pembimbing 1<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select name="pembimbing1_id" class="form-control select2bs4" required>
                                                <option value="">Pilih Nama Pembimbing 1</option>
                                                @foreach ($dosens as $dosen)
                                                    <option value="{{ $dosen->id }}" @if($item->pembimbing1_id == $dosen->id) selected @endif>{{ $dosen->kode }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('pembimbing1_id'))
                                                <span style="color:red;">{{ $errors->first('pembimbing1_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Pembimbing 2<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select name="pembimbing2_id" class="form-control select2bs4" required>
                                                <option value="">Pilih Nama Pembimbing 2</option>
                                                @foreach ($dosens as $dosen)
                                                    <option value="{{ $dosen->id }}" @if($item->pembimbing2_id == $dosen->id) selected @endif>{{ $dosen->kode }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('pembimbing2_id'))
                                                <span style="color:red;">{{ $errors->first('pembimbing2_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Penguji 1<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select name="penguji1_id" class="form-control select2bs4" required>
                                                <option value="">Pilih Nama Penguji 1</option>
                                                @foreach ($dosens as $dosen)
                                                    <option value="{{ $dosen->id }}" @if($item->penguji1_id == $dosen->id) selected @endif>{{ $dosen->kode }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('penguji1_id'))
                                                <span style="color:red;">{{ $errors->first('penguji1_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Penguji 2<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select name="penguji2_id" class="form-control select2bs4" required>
                                                <option value="">Pilih Nama Penguji 2</option>
                                                @foreach ($dosens as $dosen)
                                                    <option value="{{ $dosen->id }}" @if($item->penguji2_id == $dosen->id) selected @endif>{{ $dosen->kode }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('penguji2_id'))
                                                <span style="color:red;">{{ $errors->first('penguji2_id') }}</span>
                                            @endif
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