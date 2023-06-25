@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">Input Ruangan (Prasidang) </h1>
            </div>
        </div>

        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Periode</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->periode->tahun_ajaran }} -
                                            {{ $item->periode->semester }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Nama Mahasiswa</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->mahasiswa->nama }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Judul PA</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->judul_indo }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Title</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->judul_inggris }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Pembimbing 1</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->pembimbing1->nama }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Pembimbing 2</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->pembimbing2->nama }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Penguji 1</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->penguji1->nama }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Penguji 2</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->penguji2->nama }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                @if (session('auth_login') == 'koordinator_pa')
                                    <form
                                        action="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang.input-jadwal-prasidang.update', ['id' => $item->id]) }}"
                                        method="POST" enctype="multipart/form-data">
                                    @else
                                        <form
                                            action="{{ route('backend.admin.upload-daftar-mahasiswa.prasidang.input-jadwal-prasidang.update', ['id' => $item->id, 'jadwal_id' => (isset($jadwal_prasidang->id))? $jadwal_prasidang->id : '']) }}"
                                            method="POST" enctype="multipart/form-data">
                                @endif
                                @csrf
                                @if (session('auth_login') == 'koordinator_pa')
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label  font-weight-bold">Periode</label>
                                        <div class="col-sm-10">
                                            <select onchange="selectedPeriode(this.value)" class="form-control col-4"
                                                style="">
                                                @foreach ($periodes as $periode)
                                                    <option value="{{ $periode->semester }}" selected>
                                                        {{ $periode->tahun_ajaran }} - {{ $periode->semester }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            class="col-sm-2 col-form-label @error('bulan') is-invalid @enderror font-weight-bold">Bulan</label>
                                        <div class="col-sm-10">
                                            <select name="bulan" class="form-control col-4" style=""
                                                id="bulan_opsi">
                                            </select>
                                            @error('bulan')
                                                <span style="color:red;">{{ $errors->first('bulan') }}</span>
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Tanggal</label>
                                        <div class="col-sm-10">
                                            <input type="date"
                                                class="form-control @error('tanggal_prasidang') is-invalid @enderror"
                                                name="tanggal_prasidang"
                                                value="{{ old('judul', (isset($jadwal_prasidang->tanggal_prasidang))? $jadwal_prasidang->tanggal_prasidang : '') }}"
                                                required>
                                            @error('tanggal_prasidang')
                                                <span style="color:red;">{{ $errors->first('tanggal_prasidang') }}</span>
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            @if ($errors->has('tanggal_prasidang'))
                                                <span style="color:red;">{{ $errors->first('tanggal_prasidang') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Jam</label>
                                        <div class="col-sm-10">
                                            <div class="row p-0 m-0">
                                                <input style="width: 200px;" type="time"
                                                    class="form-control @error('jam_mulai_prasidang') is-invalid @enderror mr-3"
                                                    name="jam_mulai_prasidang"
                                                    value="{{ old('judul', (isset($jadwal_prasidang->jam_mulai_prasidang))? $jadwal_prasidang->jam_mulai_prasidang : '') }}"
                                                    required>
                                                @error('jam_mulai_prasidang')
                                                    <span style="color:red;">{{ $errors->first('jam_mulai_prasidang') }}</span>
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <input style="width: 200px;" type="time"
                                                    class="form-control @error('jam_selesai_prasidang') is-invalid @enderror"
                                                    name="jam_selesai_prasidang"
                                                    value="{{ old('judul', (isset($jadwal_prasidang->jam_selesai_prasidang))? $jadwal_prasidang->jam_selesai_prasidang : '') }}"
                                                    required>
                                                @error('jam_selesai_prasidang')
                                                    <span
                                                        style="color:red;">{{ $errors->first('jam_selesai_prasidang') }}</span>
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <i class="mt-2 ml-3">Format hh:mm:ss</i>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Ruangan<span
                                                style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select name="ruangan_id"
                                                class="form-control @error('ruangan_id') is-invalid @enderror" required>
                                                <option value="">Pilih Ruangan</option>
                                                <option value="" @if (str_contains((isset($jadwal_prasidang->ruangan))? $jadwal_prasidang->ruangan : '' ?? '', 'http')) selected @endif>
                                                    Online</option>
                                                @foreach ($ruangans as $ruangan)
                                                    <option value="{{ $ruangan->id }}"
                                                        @if ((isset($jadwal_prasidang->ruangan_id))? $jadwal_prasidang->ruangan_id : '' ?? 0 == $ruangan->id) selected @endif>
                                                        {{ $ruangan->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('ruangan_id')
                                                <span style="color:red;">{{ $errors->first('ruangan_id') }}</span>
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            @if ($errors->has('ruangan_id'))
                                                <span style="color:red;">{{ $errors->first('ruangan_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Link Zoom / Google
                                            Meet</label>
                                        <div class="col-sm-10">
                                            @if ((isset($jadwal_prasidang)
                                                <input))? $jadwal_prasidang)
                                                <input : '' type="text"
                                                    class="form-control" @error('ruangan') is-invalid @enderror name="ruangan"
                                                    value="{{ old('judul', (isset($jadwal_prasidang->ruangan_id))? $jadwal_prasidang->ruangan_id : '') == null ? (isset($jadwal_prasidang->ruangan))? $jadwal_prasidang->ruangan : '' : '' }}">
                                            @else
                                                <input type="text"
                                                    class="form-control @error('ruangan') is-invalid @enderror"
                                                    name="ruangan">
                                            @endif
                                            @error('ruangan')
                                                <span style="color:red;">{{ $errors->first('ruangan') }}</span>
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <i>Diisi ketika ruangan Online</i>
                                            @if ($errors->has('ruangan'))
                                                <span style="color:red;">{{ $errors->first('ruangan') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                <button type="submit" class="btn btn-primary btn-save shadow bg-primary">Simpan</button>
                                <div class="form-group row mt-2">
                                    <label class="col-sm-2 col-form-label"><span class="font-weight-bold"
                                            style="color:red;">*</span>)Wajib Diisi</label>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        const selectedPeriode = (element) => {
            const bulan_opsi = document.querySelector('#bulan_opsi')
            if (element == 'Genap') {
                bulan_opsi.innerHTML = `
                    <option value="2" selected >Februari</option>
                    <option value="3" selected >Maret</option>
                    <option value="4" selected >April</option>
                    <option value="5" selected >Mei</option>
                    <option value="6" selected >Juni</option>
                    <option value="7" selected >Juli</option>
                `
            } else {
                bulan_opsi.innerHTML = `
                    <option value="8" selected >Agustus</option>
                    <option value="9" selected >September</option>
                    <option value="10" selected >Oktober</option>
                    <option value="11" selected >November</option>
                    <option value="12" selected> Desember</option>
                    <option value="1" selected >Januari</option>
                `

            }
        }
    </script>
@endsection
