@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Prodi Madusem @if (request()->periode)
                                Periode {{ request()->periode }}
                            @endif
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
                                <table id="example1" class="table table-hover borderless" style="width: 100%; border: 0;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th>Nama Prodi</th>
                                            <th style="width: 150px">Singkatan Prodi</th>
                                            <th style="width: 150px">Tahun Ajaran</th>
                                            <th style="width: 150px">Semester</th>
                                            <th style="width: 150px">Input Mahasiswa Madusem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($items as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->prodi->nama }}</td>
                                                <td>{{ $item->prodi->singkatan }}</td>
                                                <td>{{ $item->tahun_ajaran }}</td>
                                                <td>{{ $item->semester }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="window.location='{{ route('backend.koordinator-pa.komponen-nilai.input-nilai-form.detail', ['id' => $item->id]) }}'">Input
                                                    </button>
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
            <section class="content ml-4 mr-4 mb-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    {{-- <div class="form-group row">
                                        <label class="col-sm-1 col-form-label font-weight-bold">Periode </label>
                                        <div class="col-sm-10">
                                            <select class="form-control col-sm-2" id="periode_id" >
                                                @foreach ($periodes as $periode)
                                                    <option value="{{ $periode->id }}" @if ($periode_id == $periode->id) selected @endif>{{ $periode->tahun_ajaran }} - {{ $periode->semester }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}
                                    <table class="table table-hover border" style="width: 100%; border: 0; ">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center; width: 100px;">No KN</th>
                                                <th style="text-align: center; border-left: 2px solid #dee2e6;">Nama Komponen</th>
                                                <th style="text-align: center; border-left: 2px solid #dee2e6; width: 200px;">
                                                    Nilai Maksimal</th>
                                                <th style="text-align: center; border-left: 2px solid #dee2e6; width: 200px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($komponenNilai as $kn)
                                                <tr class="border">
                                                    <td style="border-right: 2px solid #dee2e6;">KN {{ $no++ }}</td>
                                                    <td style="border-right: 2px solid #dee2e6;">{{ $kn->nama_komponen }}</td>
                                                    <td style="border-right: 2px solid #dee2e6; text-align: center;">
                                                        {{ $kn->presentase }}</td>
                                                    <td style="border-right: 2px solid #dee2e6; text-align: center;">
                                                        <a href="{{ route('backend.koordinator-pa.komponen-nilai.madusem.delete', ['id' => $kn->id]) }}" class="btn btn-primary shadow bg-primary" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')"> <i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3">
                                                    <center>
                                                        <b>Total Nilai : {{ $total_komponen_madusem }}</b>
                                                        @if ($total_komponen_madusem < 100)
                                                            <b style="color: #d9534f"> Nilai Belum 100</b>
                                                        @endif
                                                    </center>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        + Tambah Data
                    </button>
    
                    {{-- <a href="{{ route('backend.koordinator-pa.komponen-nilai.prasidang.edit', ['periode_id' => $periode_id]) }}"
                        class="btn btn-primary float-right">Edit Nilai</a>
                    <a href="{{ route('backend.koordinator-pa.komponen-nilai.prasidang.upload') }}"
                        class="btn btn-primary float-right mr-2">Upload</a> --}}
                </div>
            </section>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Komponen Nilai Madusem</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('backend.koordinator-pa.komponen-nilai.madusem.add') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
    
                            <label>Nomor KN</label>
                            <input type="number" class="form-control" value="{{ $no }}" readonly>
    
                            <label>Nama Komponen Nilai</label>
                            <input type="text" class="form-control" name="nama_komponen" required>
    
                            <label>Nilai Maksimal</label>
                            <input type="number" class="form-control" name="presentase" required>
    
                            {{-- <label>Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="5" required></textarea> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
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
