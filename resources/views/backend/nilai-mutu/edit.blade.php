@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Daftar Nilai Mutu</h1>
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
                                <form action="{{ route('backend.admin.nilai-mutu.update', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Kode Mutu <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="index" class="form-control" value="{{ $item->index }}" required>
                                            @if ($errors->has('index'))
                                                <span style="color:red;">{{ $errors->first('index') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Nilai Min <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" name="nilai_min" class="form-control" value="{{ $item->nilai_min }}" required>
                                            @if ($errors->has('nilai_min'))
                                                <span style="color:red;">{{ $errors->first('nilai_min') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Nilai Maks <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" name="nilai_maks" class="form-control" value="{{ $item->nilai_maks }}" required>
                                            @if ($errors->has('nilai_maks'))
                                                <span style="color:red;">{{ $errors->first('nilai_maks') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Periode <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select name="tahun_ajaran" class="form-control" required>
                                                <option value="">Pilih Periode</option>
                                                @foreach ($periodes as $periode)
                                                    <option value="{{ $periode->tahun_ajaran }}" @if($periode->tahun_ajaran == $item->tahun_ajaran) selected @endif>{{ $periode->tahun_ajaran }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('tahun_ajaran'))
                                                <span style="color:red;">{{ $errors->first('tahun_ajaran') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Semester <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select name="semester" class="form-control" required>
                                                <option value="">Pilih Semester</option>
                                                <option value="Ganjil" @if('Ganjil' == $item->semester) selected @endif>Ganjil</option>
                                                <option value="Genap" @if('Genap' == $item->semester) selected @endif>Genap</option>
                                            </select>
                                            @if ($errors->has('semester'))
                                                <span style="color:red;">{{ $errors->first('semester') }}</span>
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