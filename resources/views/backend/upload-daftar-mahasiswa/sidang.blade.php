@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @if(session('auth_login') == 'koordinator_pa')
                            <h1 class="m-0 text-dark">Data Mahasiswa Sidang (Tahap 2)</h1>
                        @else
                            <h1 class="m-0 text-dark">Data Ruangan Sidang</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            @if(session('auth_login') == 'koordinator_pa')
                                <div class="card-header">
                                    <h3 class="card-title"><a href="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.sidang.create') }}" class="btn btn-primary shadow bg-primary"> <i class="fa fa-plus"></i> Tambah</a></h3>
                                </div>
                            @endif
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-hover borderless" style="width: 100%; border: 0;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th style="width: 150px;">NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th style="width: 150px;">Judul</th>
                                            <th style="width: 150px;">Title</th>
                                            <th style="width: 75px;">PBB 1</th>
                                            <th style="width: 75px;">PBB 2</th>
                                            <th style="width: 75px;">PUJ 1</th>
                                            <th style="width: 75px;">PUJ 2</th>
                                            @if (session('auth_login') != 'koordinator_pa')
                                                <th style="width: 150px;">Tanggal Sidang</th>
                                                <th style="width: 150px;">Jam Mulai</th>
                                                <th style="width: 150px;">Jam Selesai</th>
                                                <th style="width: 150px;">Ruangan</th>
                                                <th style="width: 150px;">Link</th>
                                            @endif
                                            @if(session('auth_login') == 'koordinator_pa')
                                                <th style="width: 100px; text-align: center;">Aksi</th>
                                            @endif
                                            <th style="width: 100px; text-align: center;">Input Jadwal Sidang</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach($items as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->mahasiswa->nim }}</td>
                                                <td>{{ $item->mahasiswa->nama }}</td>
                                                <td>{{ $item->judul_indo }}</td>
                                                <td>{{ $item->judul_inggris }}</td>
                                                <td>{{ $item->pembimbing1->kode }}</td>
                                                <td>{{ $item->pembimbing2->kode }}</td>
                                                <td>{{ $item->penguji1->kode }}</td>
                                                <td>{{ $item->penguji2->kode }}</td>
                                                @if (session('auth_login') != 'koordinator_pa')
                                                    <td>{{ $item->jadwal_sidang->tanggal_sidang ?? '-' }}</td>
                                                    <td>{{ $item->jadwal_sidang->jam_mulai_sidang ?? '-' }}</td>
                                                    <td>{{ $item->jadwal_sidang->jam_selesai_sidang ?? '-' }}</td>
                                                    @if($item->jadwal_sidang)
                                                        <td>{{ $item->jadwal_sidang->ruangan_id == null ? 'Online' : $item->jadwal_sidang->ruangan }}</td>
                                                        <td><a target="_blank" href="{{ $item->jadwal_sidang->ruangan_id == null ? $item->jadwal_sidang->ruangan : '' }}">{{ $item->jadwal_sidang->ruangan_id == null ? $item->jadwal_sidang->ruangan : '' }}</a></td>
                                                    @else
                                                        <td>-</td>
                                                        <td>-</td>
                                                    @endif
                                                @endif
                                                @if(session('auth_login') == 'koordinator_pa')
                                                    <td style="text-align: center">
                                                        <a href="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.sidang.edit', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary"> <i class="fa fa-edit"></i></a>
                                                        <a href="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.sidang.delete', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')"> <i class="fa fa-trash"></i></a>
                                                    </td>
                                                @endif
                                                @if(session('auth_login') == 'koordinator_pa')
                                                    <td style="text-align: center">
                                                        <a href="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.sidang.input-jadwal-sidang', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary">Input</a>
                                                    </td>
                                                @else
                                                    <td style="text-align: center">
                                                        <a href="{{ route('backend.admin.upload-daftar-mahasiswa.sidang.input-jadwal-sidang', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary">Input</a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if(session('auth_login') == 'koordinator_pa')
                                    @if(\Route::currentRouteName() == 'backend.koordinator-pa.upload-daftar-mahasiswa.sidang')
                                        <a href="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.sidang.upload-jadwal') }}" class="btn btn-primary shadow bg-primary float-right mt-3 ml-3">Upload Jadwal Sidang</a>
                                    @endif
                                    <a href="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.sidang.download') }}" class="btn btn-primary shadow bg-primary float-right mt-3">Download</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection