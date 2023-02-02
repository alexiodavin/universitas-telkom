@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Upload Komponen Nilai Sidang</h1>
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
                                <form action="{{ route('backend.koordinator-pa.komponen-nilai.sidang.upload.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Download File</label>
                                        <div class="col-sm-10">
                                            <a  class="btn btn-primary" href="{{ asset('file/template_komponen_sidang.xlsx') }}" download>Template Excel</a>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Upload File <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control-file" name="file" required>
                                            @if ($errors->has('file'))
                                                <span style="color:red;">{{ $errors->first('file') }}</span>
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