@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Mahasiswa Proposal</h1>
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
                                            <th style="width: 100px;">NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th style="width: 200px;">Judul</th>
                                            <th style="width: 125px;">PBB 1</th>
                                            <th style="width: 125px;">PBB 2</th>
                                            <th style="width: 125px;">PUJ 1</th>
                                            <th style="width: 125px;">PUJ 2</th>
                                            <th style="width: 150px;">Progress Mahasiswa</th>
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
                                                <td>{{ $item->pembimbing1->nama_gelar }}</td>
                                                <td>{{ $item->pembimbing2->nama_gelar }}</td>
                                                <td>{{ $item->penguji1->nama_gelar }}</td>
                                                <td>{{ $item->penguji2->nama_gelar }}</td>
                                                <td>{{ $item->status }}</td>
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