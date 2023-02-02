@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Input Daftar Ruangan</h1>
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
                                <form action="{{ route('backend.admin.ruangan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Kode Ruangan<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="kode" class="form-control" value="{{ old('kode') }}" required>
                                            @if ($errors->has('kode'))
                                                <span style="color:red;">{{ $errors->first('kode') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Ruangan <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                                            @if ($errors->has('nama'))
                                                <span style="color:red;">{{ $errors->first('nama') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Keterangan <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <textarea name="keterangan" class="form-control" rows="5">{{ old('keterangan') }}</textarea>
                                            @if ($errors->has('keterangan'))
                                                <span style="color:red;">{{ $errors->first('keterangan') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-save shadow bg-primary">Simpan</button>
                                    <div class="form-group row mt-2">
                                        <label class="col-sm-2 col-form-label"><span class="font-weight-bold" style="color:red;">*</span>)Wajib Diisi</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection