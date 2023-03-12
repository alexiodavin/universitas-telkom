@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Periode</h1>
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
                                <h3 class="card-title"><a href="{{ route('backend.admin.periode-semester.create') }}"
                                        class="btn btn-primary shadow bg-primary"> <i class="fa fa-plus"></i> Tambah</a>
                                </h3>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-hover borderless" style="width: 100%; border: 0;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th>Tahun Ajaran</th>
                                            <th style="width: 100px">Semester</th>
                                            <th style="width: 100px;">Tahun</th>
                                            <th style="width: 150px; text-align: center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($items as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->tahun_ajaran }}</td>
                                                <td>{{ $item->semester }}</td>
                                                <td>{{ $item->tahun }}</td>
                                                <td style="text-align: center">
                                                    <a href="{{ route('backend.admin.periode-semester.edit', ['id' => $item->id]) }}"
                                                        class="btn btn-primary shadow bg-primary"> <i
                                                            class="fa fa-edit"></i> Edit</a>
                                                    <a href="{{ route('backend.admin.periode-semester.delete', ['id' => $item->id]) }}"
                                                        class="btn btn-primary shadow bg-primary"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')">
                                                        <i class="fa fa-trash"></i> Delete</a>
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
