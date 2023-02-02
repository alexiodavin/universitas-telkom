@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Dosen</h1>
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
                                <form action="{{ route('backend.admin.dosen.update', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Foto</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="foto" class="dropify" data-show-remove="false" data-default-file="{{ asset('photo/user/'.$item->dosen->foto) }}">
                                            @if ($errors->has('foto'))
                                                <span style="color:red;">{{ $errors->first('foto') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Prodi</label>
                                        <div class="col-sm-10">
                                            <select name="prodi_id" class="form-control">
                                                <option value="">Pilih Prodi</option>
                                                @foreach ($prodis as $prodi)
                                                    <option value="{{ $prodi->id }}" @if($prodi->id == $item->prodi_id) selected @endif>{{ $prodi->nama }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('prodi_id'))
                                                <span style="color:red;">{{ $errors->first('prodi_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Username<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="username" class="form-control" value="{{ $item->username }}" readonly>
                                            @if ($errors->has('username'))
                                                <span style="color:red;">{{ $errors->first('username') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Email<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control" value="{{ $item->email }}" readonly>
                                            @if ($errors->has('email'))
                                                <span style="color:red;">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Nama<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" class="form-control" value="{{ $item->dosen->nama }}" required>
                                            @if ($errors->has('nama'))
                                                <span style="color:red;">{{ $errors->first('nama') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Nama Gelar<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama_gelar" class="form-control" value="{{ $item->dosen->nama_gelar }}" required>
                                            @if ($errors->has('nama_gelar'))
                                                <span style="color:red;">{{ $errors->first('nama_gelar') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">NIP<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nip" class="form-control" value="{{ $item->dosen->nip }}" readonly>
                                            @if ($errors->has('nip'))
                                                <span style="color:red;">{{ $errors->first('nip') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Kode<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="kode" class="form-control" value="{{ $item->dosen->kode }}" readonly>
                                            @if ($errors->has('kode'))
                                                <span style="color:red;">{{ $errors->first('kode') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Telepon<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="telepon" class="form-control" value="{{ $item->dosen->telepon }}" required>
                                            @if ($errors->has('telepon'))
                                                <span style="color:red;">{{ $errors->first('telepon') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Alamat<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <textarea name="alamat" class="form-control" rows="5">{{ $item->dosen->alamat }}</textarea>
                                            @if ($errors->has('alamat'))
                                                <span style="color:red;">{{ $errors->first('alamat') }}</span>
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