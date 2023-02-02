@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Jadwal Prasidang</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-hover borderless" style="width: 100%; border: 0;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th style="width: 150px;">NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th style="width: 150px;">Judul</th>
                                            <th style="width: 150px;">PBB 1</th>
                                            <th style="width: 150px;">PBB 2</th>
                                            <th style="width: 150px;">PUJ 1</th>
                                            <th style="width: 150px;">PUJ 2</th>
                                            <th style="width: 150px;">Periode</th>
                                            <th style="width: 150px;">Bulan</th>
                                            <th style="width: 150px;">Tanggal Prasidang</th>
                                            <th style="width: 150px;">Jam Mulai</th>
                                            <th style="width: 150px;">Jam Selesai</th>
                                            <th style="width: 150px;">Ruangan</th>
                                            <th style="width: 150px;">Link</th>
                                            @if (auth()->user()->role_id == IS_DOSEN)
                                                <th style="min-width: 100px; text-align: center;">Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                            $numItems = count($items);
                                            $sama = 0;
                                        @endphp
                                        @foreach($items as $item)
                                            {{-- {{ $sama }} --}}
                                            @foreach ($items as $key => $compared_item)
                                                @if ($item->id != $compared_item->id)
                                                    @if ((($item->pembimbing1_id == $compared_item->pembimbing2_id || $item->pembimbing1_id == $compared_item->pembimbing1_id || $item->pembimbing2_id == $compared_item->pembimbing1_id || $item->pembimbing2_id == $compared_item->pembimbing2_id) && $item->tanggal_prasidang == $compared_item->tanggal_prasidang && $item->jam_mulai_prasidang >= $compared_item->jam_mulai_prasidang && $item->jam_selesai_prasidang <= $compared_item->jam_selesai_prasidang) || (($compared_item->pembimbing1_id == $item->pembimbing2_id || $compared_item->pembimbing1_id == $item->pembimbing1_id || $compared_item->pembimbing2_id == $item->pembimbing1_id || $compared_item->pembimbing2_id == $item->pembimbing2_id) && $compared_item->tanggal_prasidang == $item->tanggal_prasidang && $compared_item->jam_mulai_prasidang >= $item->jam_mulai_prasidang && $compared_item->jam_selesai_prasidang <= $item->jam_selesai_prasidang))
                                                        @php
                                                            $sama = 1;
                                                        @endphp
                                                    @endif
                                                @endif
                                            @endforeach
                                            <tr @if ($sama ==1) style="background: #D9534F" @endif>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->prasidang->mahasiswa->nim }}</td>
                                                <td>{{ $item->prasidang->mahasiswa->nama }}</td>
                                                <td>{{ $item->prasidang->judul_indo }}</td>
                                                <td>{{ $item->prasidang->pembimbing1->kode }}</td>
                                                <td>{{ $item->prasidang->pembimbing2->kode }}</td>
                                                <td>{{ $item->prasidang->penguji1->kode }}</td>
                                                <td>{{ $item->prasidang->penguji2->kode }}</td>
                                                <td>{{ $item->prasidang->tahun_ajaran }}<br>{{ $item->prasidang->semester }}</td>
                                                <td>{{ $item->bulan ?? '-'}}</td>
                                                <td>{{ $item->tanggal_prasidang ?? '-' }}</td>
                                                <td>{{ $item->jam_mulai_prasidang ?? '-' }}</td>
                                                <td>{{ $item->jam_selesai_prasidang ?? '-' }}</td>
                                                @if($item)
                                                <td>{{ $item->ruangan_id == null ? 'Online' : $item->ruangan }}</td>
                                                <td><a target="_blank" href="{{ $item->ruangan_id == null ? $item->ruangan : '' }}">@if($item->ruangan_id == null) <i class="fas fa-2x fa-video"></i> @endif</a></td>
                                                @else
                                                <td>-</td>
                                                <td>-</td>
                                                @endif
                                                @if (auth()->user()->role_id == IS_DOSEN)
                                                    <td style="text-align: center">
                                                        <a href="{{ route('backend.koordinator-pa.view-jadwal-prasidang.edit', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary"> <i class="fa fa-edit"></i></a>
                                                        <a href="{{ route('backend.koordinator-pa.view-jadwal-prasidang.delete', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')"> <i class="fa fa-trash"></i></a>
                                                    </td>
                                                @endif
                                            </tr>
                                            @php
                                                $sama = 0;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-between mt-3" style="height: 60px">
                                    <div class="d-flex flex-column justify-content-start">
                                        <p>Keterangan</p>
                                        <p>Merah : jadwal bentrok antar pembimbing</p>
                                    </div>
                                    @if(session('auth_login') == 'koordinator_pa')
                                        <a href="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang.download') }}" class="btn btn-primary shadow bg-primary float-right mt-3">Download</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection