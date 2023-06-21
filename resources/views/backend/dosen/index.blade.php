@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Dosen @if(request()->periode) Periode {{ request()->periode }} @endif</h1>
                    </div>
                </div>
            </div>
        </div>

        {{-- <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-1">
                                        <label class="form-control-plaintext">Periode : </label>
                                    </div>
                                    <div class="col-2">
                                        <select id="periode" class="form-control">
                                            <option value="">Pilih Periode</option>
                                            @foreach ($periodes as $periode)
                                                <option value="{{ $periode->tahun_ajaran }}" @if($periode->tahun_ajaran == request()->periode) selected @endif>{{ $periode->tahun_ajaran }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

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
                                            <th style="width: 150px">Detail Dosen</th>
                                            <th>Nama Prodi</th>
                                            <th style="width: 150px">Singkatan Prodi</th>
                                            {{-- <th style="width: 150px">Semester</th> --}}
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
                                                <td><a href="{{ route('backend.admin.dosen.detail', ['prodi_id' => $item->prodi_id]) }}"><img src="{{ asset('photo/search.png') }}" style="width: 100px;"></a></td>
                                                <td>{{ $item->prodi->nama }}</td>
                                                <td>{{ $item->prodi->singkatan }}</td>
                                                {{-- <td>{{ $item->semester }}</td> --}}
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

@section('js')
    <script>
        $('#periode').on('change', function() {
            window.location.href = "{{ route('backend.admin.dosen') }}"+'?periode='+this.value
        });
    </script>
@endsection
