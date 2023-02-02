@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Progress Mahasiswa</h1>
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
                                <select style="width: 200px;" class="form-control float-right">
                                    <option value="">Semua</option>
                                    {{-- <option value="belum-proposal" @if(request()->status == 'belum-proposal') selected @endif>Belum Proposal</option> --}}
                                    <option value="sudah-proposal" @if(request()->status == 'sudah-proposal') selected @endif>Sudah Proposal</option>
                                    {{-- <option value="belum-prasidang" @if(request()->status == 'belum-prasidang') selected @endif>Belum Prasidang</option> --}}
                                    <option value="sudah-prasidang" @if(request()->status == 'sudah-prasidang') selected @endif>Sudah Prasidang</option>
                                    {{-- <option value="belum-sidang" @if(request()->status == 'belum-sidang') selected @endif>Belum Sidang</option> --}}
                                    <option value="sudah-sidang" @if(request()->status == 'sudah-sidang') selected @endif>Sudah Sidang</option>
                                </select>
                                {{-- <select style="width: 175px;" class="form-control float-right">
                                    <option value="">Semua</option>
                                    @foreach ($periodes as $periode)
                                        <option value="{{ $periode->id }}" @if($periode->id == request()->periode_id) selected @endif>{{ $periode->tahun_ajaran }} / {{ $periode->semester }}</option>
                                    @endforeach
                                </select> --}}
                            </div>
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
                                                <td>{{ $item->judul_inggris }}</td>
                                                <td>{{ $item->pembimbing1->kode }}</td>
                                                <td>{{ $item->pembimbing2->kode }}</td>
                                                <td>{{ $item->penguji1->kode }}</td>
                                                <td>{{ $item->penguji2->kode }}</td>
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

@section('js')
    <script>
        $('select').on('change', function() {
            return window.location.href = "{{ url('koordinator-pa/view-progress-mahasiswa') }}?status="+this.value
            // return window.location.href = "{{ url('koordinator-pa/view-progress-mahasiswa') }}?periode_id="+this.value
        });
    </script>
@endsection