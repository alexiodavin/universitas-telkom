@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Daftar Prodi</h1>
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
                                <form action="{{ route('backend.admin.prodi.update', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Kode Prodi<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="kode" class="form-control" value="{{ $item->kode }}" readonly>
                                            @if ($errors->has('kode'))
                                                <span style="color:red;">{{ $errors->first('kode') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Singkatan Prodi<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="singkatan" class="form-control" value="{{ $item->singkatan }}" required>
                                            @if ($errors->has('singkatan'))
                                                <span style="color:red;">{{ $errors->first('singkatan') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Nama Prodi<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" class="form-control" value="{{ $item->nama }}" required>
                                            @if ($errors->has('nama'))
                                                <span style="color:red;">{{ $errors->first('nama') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Keterangan Prodi <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="keterangan" class="form-control" value="{{ $item->keterangan }}" required>
                                            @if ($errors->has('keterangan'))
                                                <span style="color:red;">{{ $errors->first('keterangan') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row">
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
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Kaprodi <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select name="kaprodi_id" class="form-control" required>
                                                <option value="">Pilih Kaprodi</option>
                                                @foreach ($dosens as $dosen)
                                                    <option value="{{ $dosen->id }}" @if($dosen->id == $item->kaprodi_id) selected @endif>{{ $dosen->nama_gelar }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('kaprodi_id'))
                                                <span style="color:red;">{{ $errors->first('kaprodi_id') }}</span>
                                            @endif
                                        </div>
                                    </div> --}}
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