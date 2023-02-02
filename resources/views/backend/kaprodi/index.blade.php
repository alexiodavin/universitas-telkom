@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dosen</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <h3 class="card-title"><a href="{{ route('backend.admin.dosen.create') }}" class="btn btn-primary shadow bg-primary"> <i class="fa fa-plus"></i> Tambah</a></h3>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-hover borderless" style="width: 100%; border: 0;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th style="width: 50px">foto</th>
                                            <th>Nama Gelar</th>
                                            <th style="width: 150px">Prodi</th>
                                            <th style="width: 150px">NIP</th>
                                            <th style="width: 150px">Telepon</th>
                                            <th style="width: 150px; text-align: center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach($items as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td><img src="{{ asset('photo/user/'.$item->dosen->foto) }}" class="rounded" style="width: 50px;"></td>
                                                <td>{{ $item->dosen->nama_gelar }}</td>
                                                <td>{{ $item->prodi->nama ?? '-' }}</td>
                                                <td>{{ $item->dosen->nip }}</td>
                                                <td>{{ $item->dosen->telepon }}</td>
                                                <td style="text-align: center">
                                                    <a href="{{ route('backend.admin.dosen.edit', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary"> <i class="fa fa-edit"></i> Edit</a>
                                                    <a href="{{ route('backend.admin.dosen.delete', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')"> <i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
