@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Input Daftar Dosen</h1>
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
                                <form action="{{ route('backend.admin.dosen.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Download File</label>
                                        <div class="col-sm-10">
                                            <a  class="btn btn-primary" href="{{ asset('file/template_dosen.xlsx') }}" download>Template Excel</a>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Program Studi <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select id="prodi_id" name="prodi_id" class="form-control" required>
                                                <option value="">Pilih Program Studi</option>
                                                @foreach ($prodis as $prodi)
                                                    <option value="{{ $prodi->id }}">{{ $prodi->nama }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('prodi_id'))
                                                <span style="color:red;">{{ $errors->first('prodi_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Kode Prodi <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="kode" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Singkatan Prodi <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="singkatan" class="form-control" readonly>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Periode <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select name="tahun_ajaran" class="form-control" required>
                                                <option value="">Pilih Periode</option>
                                                @foreach ($periodes as $periode)
                                                    <option value="{{ $periode->tahun_ajaran }}">{{ $periode->tahun_ajaran }}</option>
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
                                                <option value="Ganjil">Ganjil</option>
                                                <option value="Genap">Genap</option>
                                            </select>
                                            @if ($errors->has('semester'))
                                                <span style="color:red;">{{ $errors->first('semester') }}</span>
                                            @endif
                                        </div>
                                    </div> --}}
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

@section('js')
    <script>
        $('#prodi_id').on('change', function() {
            $.get("{{ route('api.prodi.find') }}"+'?id='+this.value, function(response){
                if(response.data){
                    $('#kode').val(response.data.kode)
                    $('#singkatan').val(response.data.singkatan)
                }else{
                    $('#kode').val('')
                    $('#singkatan').val('')
                }
            });
        });
    </script>
@endsection