@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Input Daftar Periode</h1>
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
                                <form action="{{ route('backend.admin.periode.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Tahun Ajaran<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="tahun_ajaran" class="form-control" value="{{ old('tahun_ajaran') }}" required>
                                            @if ($errors->has('tahun_ajaran'))
                                                <span style="color:red;">{{ $errors->first('tahun_ajaran') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Semester<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select name="semester" class="form-control" required>
                                                <option value="Genap">Genap</option>
                                                <option value="Ganjil">Ganjil</option>
                                            </select>
                                            @if ($errors->has('semester'))
                                                <span style="color:red;">{{ $errors->first('semester') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Bulan <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select name="bulan" class="form-control" id="bulan" required>
                                                <option selected disabled value="">Pilih Bulan</option>
                                                @foreach ($bulan as $key => $value)
                                                    <option value="{{ $value }}" {{ ($value == old('bulan')? "selected" : "") }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('bulan'))
                                                <span style="color:red;">{{ $errors->first('bulan') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Tahun <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" name="tahun" class="form-control" value="{{ old('tahun') }}" required>
                                            @if ($errors->has('tahun'))
                                                <span style="color:red;">{{ $errors->first('tahun') }}</span>
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