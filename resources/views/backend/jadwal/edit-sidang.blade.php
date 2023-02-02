@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">Edit Data Jadwal Sidang</h1>
            </div>
        </div>

        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <form action="{{ route('backend.koordinator-pa.view-jadwal-sidang.update', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    @if(session('auth_login') == 'koordinator_pa')
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Tanggal<span style="color:red;"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tanggal_sidang" value="{{ $item->jadwal_sidang->tanggal_sidang ?? null }}" required>
                                                @if ($errors->has('tanggal_sidang'))
                                                    <span style="color:red;">{{ $errors->first('tanggal_sidang') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bold">Bulan<span style="color:red;"> *</span></label>
                                                <div class="col-sm-10">
                                                    <div class="row p-0 m-0">
                                                        <select id="bulan_id" name="bulan" class="form-control" required>
                                                            <option value="">Pilih Bulan</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Jam<span style="color:red;"> *</span></label>
                                            <div class="col-sm-10">
                                                <div class="row p-0 m-0">
                                                    <input style="width: 200px;" type="time" class="form-control mr-3" name="jam_mulai_sidang" value="{{ $item->jadwal_sidang->jam_mulai_sidang ?? null }}" required>
                                                    <input style="width: 200px;" type="time" class="form-control" name="jam_selesai_sidang" value="{{ $item->jadwal_sidang->jam_selesai_sidang ?? null }}" required>
                                                    <i class="mt-2 ml-3">Format hh:mm:ss</i>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Ruangan<span style="color:red;"> *</span></label>
                                            <div class="col-sm-10">
                                            <select name="ruangan_id" class="form-control" required>
                                                <option value="">Pilih Ruangan</option>
                                                <option value="" @if(str_contains($item->jadwal_sidang->ruangan ?? '', 'http')) selected @endif>Online</option>
                                                @foreach ($ruangans as $ruangan)
                                                    <option value="{{ $ruangan->id }}" @if($item->jadwal_sidang->ruangan_id ?? 0 == $ruangan->id) selected @endif>{{ $ruangan->nama }}</option>
                                                @endforeach
                                            </select>
                                                @if ($errors->has('ruangan_id'))
                                                    <span style="color:red;">{{ $errors->first('ruangan_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Link Zoom / Google Meet</label>
                                            <div class="col-sm-10">
                                                @if($item->jadwal_sidang)
                                                    <input type="text" class="form-control" name="ruangan" value="{{ $item->jadwal_sidang->ruangan_id == null ? $item->jadwal_sidang->ruangan : '' }}">
                                                @else
                                                    <input type="text" class="form-control" name="ruangan">
                                                @endif
                                                <i>Diisi ketika ruangan Online</i>
                                                @if ($errors->has('ruangan'))
                                                    <span style="color:red;">{{ $errors->first('ruangan') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                <button type="submit" class="btn btn-primary btn-save shadow bg-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            
                const opsiBulan = document.querySelector('#bulan_id');
                // opsiBulan.innerHTML = ``;
                if("{{ $item->sidang->periode->semester }}" == "Genap"){
                    opsiBulan.innerHTML += `
                    <option value="2" selected >Februari</option>
                    <option value="3" selected >Maret</option>
                    <option value="4" selected >April</option>
                    <option value="5" selected >Mei</option>
                    <option value="6" selected >Juni</option>
                    <option value="7" selected >Juli</option>
                    `
                } else{
                    opsiBulan.innerHTML += `
                    <option value="8" selected >Agustus</option>
                    <option value="9" selected >September</option>
                    <option value="10" selected >Oktober</option>
                    <option value="11" selected >November</option>
                    <option value="12" selected> Desember</option>
                    <option value="1" selected >Januari</option>
                    `
                }
            });

    </script>
@endsection