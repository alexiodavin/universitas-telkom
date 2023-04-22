@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Mahasiswa Proposal (Tahap 1)</h1>
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
                                <h3 class="card-title"><a
                                        href="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.proposal.create') }}"
                                        class="btn btn-primary shadow bg-primary"> <i class="fa fa-plus"></i> Tambah</a>
                                </h3>
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
                                            <th style="width: 100px; text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($items as $item)
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
                                                <td style="text-align: center">
                                                    <a href="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.proposal.edit', ['id' => $item->id]) }}"
                                                        class="btn btn-primary shadow bg-primary"> <i
                                                            class="fa fa-edit"></i></a>
                                                    <a href="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.proposal.delete', ['id' => $item->id]) }}"
                                                        class="btn btn-primary shadow bg-primary"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')">
                                                        <i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="button" class="mt-4 btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    View Mahasiswa Proposal
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 80%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Daftar mahasiswa proposal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST"
                    action="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang.store') }}">
                    @csrf
                    <div class="card-body table-responsive">
                        <table id="table-search" class="table table-hover borderless" style="width: 100%; border: 0;">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th style="width: 150px;">NIM</th>
                                    <th style="width: 200px">Nama Mahasiswa</th>
                                    <th style="width: 150px;">Judul</th>
                                    <th style="width: 150px;">Title</th>
                                    <th style="width: 75px;">PBB 1</th>
                                    <th style="width: 75px;">PBB 2</th>
                                    <th style="width: 75px;">PUJ 1</th>
                                    <th style="width: 75px;">PUJ 2</th>
                                    <th style="width: 75px; text-align: center;">Checklist</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($items as $item)
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
                                        <td style="text-align: center">
                                            <input class="form-check-input checkSingle" type="checkbox"
                                                value="{{ $item->id }}" name="idProposal[]"
                                                style="width: 25px; height:25px">
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="">

                                    </td>
                                    <td style="text-align: center">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <h4>Periode Prasidang</h4>
                        <div class="w-100 d-flex justify-content-between">
                            <div class="col-lg-2">
                                <select name="tahun_ajaran" class="form-control" required>
                                    <option value="">Pilih Tahun Ajaran</option>
                                    @foreach ($list_tahun_ajaran as $tahun_ajaran)
                                        <option value="{{ $tahun_ajaran->tahun_ajaran }}">
                                            {{ $tahun_ajaran->tahun_ajaran }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('tahun_ajaran'))
                                    <span style="color:red;">{{ $errors->first('tahun_ajaran') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-2">
                                <select name="semester" class="form-control" required>
                                    <option value="">Pilih Semester</option>
                                    <option value="Ganjil">Ganjil</option>
                                    <option value="Genap">Genap</option>
                                </select>
                                @if ($errors->has('semester'))
                                    <span style="color:red;">{{ $errors->first('semester') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-2">
                                <select name="bulan" class="form-control" required>
                                    <option value="">Pilih Bulan</option>
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desembar">Desembar</option>
                                </select>
                                @if ($errors->has('bulan'))
                                    <span style="color:red;">{{ $errors->first('bulan') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-3">
                                <button type="submit" class="btn btn-primary">
                                    Daftarkan prasidang
                                </button>
                            </div>
                            <div class="col-lg-3 d-flex justify-content-end"
                                style="align-items:center;margin-top: 1.5rem">
                                <label for="" class="" style="width:150px ">Pilih Semua</label>
                                <div style="width: 60px">
                                    <input class="form-check-input checkAll" type="checkbox" id="select-all"
                                        style="width: 25px; height:25px; position: relative;">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        $('#select-all').click(function(event) {
            if (this.checked) {
                // Iterate each checkbox
                $('.checkSingle').each(function() {
                    this.checked = true;
                });
            } else {
                $('.checkSingle').each(function() {
                    this.checked = false;
                });
            }
        });

        $(function() {
            $("#table-search").DataTable();
        });
    </script>
@endsection
