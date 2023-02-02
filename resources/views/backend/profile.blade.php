@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Profil</h1>
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
                                <form id="form-profile" method="POST" action="{{ route('backend.profile.update') }}" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                                    @csrf            
                                    <div class="col-lg-4">
                                        @if (auth()->user()->role_id == IS_ADMIN)
                                            <div class="form-group">
                                                <label for="name" class="control-label">Nama <span style="color:red;"> *</span></label>
                                                <div>
                                                    <input type="text" name="nama" class="form-control" value="{{ Auth::user()->admin->nama }}" required>
                                                    @if ($errors->has('nama'))
                                                        <span class="help-block with-errors text-danger">{{ $errors->first('nama') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label">Telepon <span style="color:red;"> *</span></label>
                                                <div>
                                                    <input type="text" name="telepon" class="form-control" value="{{ Auth::user()->admin->telepon }}" required>
                                                    @if ($errors->has('telepon'))
                                                        <span class="help-block with-errors text-danger">{{ $errors->first('telepon') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @elseif (auth()->user()->role_id == IS_DOSEN)
                                            <div class="form-group">
                                                <label for="name" class="control-label">Nama <span style="color:red;"> *</span></label>
                                                <div>
                                                    <input type="text" name="nama" class="form-control" value="{{ Auth::user()->dosen->nama }}" required>
                                                    @if ($errors->has('nama'))
                                                        <span class="help-block with-errors text-danger">{{ $errors->first('nama') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label">Nama Gelar <span style="color:red;"> *</span></label>
                                                <div>
                                                    <input type="text" name="nama_gelar" class="form-control" value="{{ Auth::user()->dosen->nama_gelar }}" required>
                                                    @if ($errors->has('nama_gelar'))
                                                        <span class="help-block with-errors text-danger">{{ $errors->first('nama_gelar') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label">NIP <span style="color:red;"> *</span></label>
                                                <div>
                                                    <input type="text" name="nip" class="form-control" value="{{ Auth::user()->dosen->nip }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label">Kode Dosen <span style="color:red;"> *</span></label>
                                                <div>
                                                    <input type="text" name="kode" class="form-control" value="{{ Auth::user()->dosen->kode }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label">Telepon <span style="color:red;"> *</span></label>
                                                <div>
                                                    <input type="text" name="telepon" class="form-control" value="{{ Auth::user()->dosen->telepon }}" required>
                                                    @if ($errors->has('telepon'))
                                                        <span class="help-block with-errors text-danger">{{ $errors->first('telepon') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label">Alamat <span style="color:red;"> *</span></label>
                                                <div>
                                                    <textarea name="alamat" class="form-control" rows="5" required>{{ Auth::user()->dosen->alamat }}</textarea>
                                                    @if ($errors->has('alamat'))
                                                        <span class="help-block with-errors text-danger">{{ $errors->first('alamat') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @elseif (auth()->user()->role_id == IS_MAHASISWA)
                                            <div class="form-group">
                                                <label for="name" class="control-label">Nama <span style="color:red;"> *</span></label>
                                                <div>
                                                    <input type="text" name="nama" class="form-control" value="{{ Auth::user()->mahasiswa->nama }}" required>
                                                    @if ($errors->has('nama'))
                                                        <span class="help-block with-errors text-danger">{{ $errors->first('nama') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label">NIM <span style="color:red;"> *</span></label>
                                                <div>
                                                    <input type="text" name="nim" class="form-control" value="{{ Auth::user()->mahasiswa->nim }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label">Telepon <span style="color:red;"> *</span></label>
                                                <div>
                                                    <input type="text" name="telepon" class="form-control" value="{{ Auth::user()->mahasiswa->telepon }}" required>
                                                    @if ($errors->has('telepon'))
                                                        <span class="help-block with-errors text-danger">{{ $errors->first('telepon') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label">Alamat <span style="color:red;"> *</span></label>
                                                <div>
                                                    <textarea name="alamat" class="form-control" rows="5" required>{{ Auth::user()->mahasiswa->alamat }}</textarea>
                                                    @if ($errors->has('alamat'))
                                                        <span class="help-block with-errors text-danger">{{ $errors->first('alamat') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="username" class="control-label">Username <span style="color:red;"> *</span></label>
                                            <div>
                                                <input type="text" id="username" name="username" class="form-control" readonly value="{{ Auth::user()->username }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="control-label">Email <span style="color:red;"> *</span></label>
                                            <div>
                                                <input type="email" id="email" name="email" class="form-control" readonly value="{{ Auth::user()->email }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="col-sm-12 row">
                                                <input type="password" name="password" class="form-control password" style="width: 90%;"> <i id="password" class="btn btn-primary fa fa-eye"></i>
                                                <i class="help-block font-italic">Biarkan kosong jika tidak ingin mengubah password</i>
                                                @if ($errors->has('password'))
                                                    <br><span class="help-block with-errors text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="name" class="control-label">Foto</label>
                                            <div>
                                                <input type="file" name="foto" class="form-control">
                                                <i class="help-block font-italic">Biarkan kosong jika tidak ingin mengubah foto</i>
                                                @if ($errors->has('foto'))
                                                    <span style="color:red;">{{ $errors->first('foto') }}</span>
                                                @endif
                                            </div>
                                        </div> --}}
                                        <button type="submit" id="btn-submit" class="btn btn-primary btn-save">Simpan</button>
                                        </div>
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
        $(document).ready(function(){
            $('#password').on('click', function(){
                $('.password').attr('type', 'text')
            })
        })
    </script>
@endsection
