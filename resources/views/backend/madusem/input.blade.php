@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Nama Mahasiswa Magang Dua Semester
                        </h1>
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
                                <a href="{{ route('backend.koordinator-pa.komponen-nilai.download-excel') }}" class="btn btn-primary mb-2">Unduh Template Excel</a>
                                </a>
                                <a type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                data-target="#dosenModal">List Dosen</a>
                                <table id="example1" class="table table-hover borderless " style="width: 100%; border: 0;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th>Nama</th>
                                            <th>nim</th>
                                            <th></th>
                                            {{-- <th>status</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($mahasiswa as $item)
                                            <div class="row">
                                                <div class="col-6">
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $item->nama }}</td>
                                                        <td>{{ $item->nim }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary"
                                                                onclick="window.location='{{ route('backend.input-nilai.detail', ['id' => $item->id]) }}'">Input
                                                            </button>
                                                        </td>
                                                        {{-- <td>@php
                                                            dd($item->madusem->mahasiswa);
                                                        @endphp
                                                            <div id="mahasiswa-status-{{ $item->id }}">
                                                                @if ($item->madusem->mahasiswa->id)
                                                                    ✅
                                                                @else
                                                                    ❌
                                                                @endif
                                                            </div>
                                                        </td> --}}
                                                    </tr>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{ route('backend.koordinator-pa.komponen-nilai.upload-excel') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="excelFile">Upload Excel File:</label>
                                <input type="file" class="form-control-file @error('excelFile') is-invalid @enderror" id="excelFile"
                                    name="excelFile">
        
                                @error('excelFile')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
        
                            <button type="submit" class="btn btn-primary">Upload Excel</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
    <div class="modal fade" id="dosenModal" tabindex="-1" role="dialog" aria-labelledby="dosenModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">List Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover border" style="width: 100%; border: 0;">
                    <thead>
                        <tr>
                            <th style="width: 10px; border-right: 2px solid #dee2e6;">ID</th>
                            <th style="border-right: 2px solid #dee2e6;">Kode</th>
                            <th style="border-right: 2px solid #dee2e6;">Nama Dosen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembimbing as $dosen)
                            <tr>
                                <td style="border-right: 2px solid #dee2e6;">{{ $dosen->id }}</td>
                                <td style="border-right: 2px solid #dee2e6;">{{ $dosen->kode }}</td>
                                <td style="border-right: 2px solid #dee2e6;">{{ $dosen->nama }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('#periode').on('change', function() {
            window.location.href = "{{ route('backend.admin.mahasiswa') }}" + '?periode=' + this.value
        });
    </script>
@endsection
