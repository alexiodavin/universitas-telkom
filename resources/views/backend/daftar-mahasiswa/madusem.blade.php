@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Daftar Mahasiswa Madusem</h1>
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
                                <div style="overflow-x: auto;">
                                    <table id="example1" class="table table-hover borderless"
                                        style="width: 100%; border: 0;">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>Nama Mahasiswa</th>
                                                <th style="width: 150px;">NIM</th>
                                                <th style="width: 150px;">PBB 1</th>
                                                <th style="width: 150px;">PBB 2</th>
                                                <th style="width: 150px;">PUJ 1</th>
                                                <th style="width: 150px;">PUJ 2</th>
                                                @foreach ($komponenNilai as $nilai)
                                                    <th style="width: 150px;">{{ $nilai->nama_komponen }}</th>
                                                @endforeach
                                                <th style="width: 150px;">Deadline Revisi</th>
                                                <th style="width: 450px;">Catatan Revisi</th>
                                                <th style="width: 150px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($madusemDetails as $madusem)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $madusem->mahasiswa->nama }}</td>
                                                    <td>{{ $madusem->mahasiswa->nim }}</td>
                                                    <td>{{ $madusem->pbb1->kode }}</td>
                                                    <td>{{ $madusem->pbb2->kode }}</td>
                                                    <td>{{ $madusem->puj1->kode }}</td>
                                                    <td>{{ $madusem->puj2->kode }}</td>
                                                    @foreach ($madusem->komponenMadusemPivots as $pivot)
                                                        <td>{{ $pivot->nilai_komponen ?? 0 }}</td>
                                                    @endforeach
                                                    <td>{{ $madusem->tanggal_selesai }}</td>
                                                    <td style="width:450px">{{ $madusem->keterangan }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm mb-2"
                                                            title="Tambahkan Catatan Revisi" data-toggle="modal"
                                                            data-target="#exampleModal-{{ $madusem->id }}">
                                                            <i class="fa-solid fa-note-sticky"></i>
                                                        </button>
                                                        <a href="{{ route('backend.dosen.daftar-mahasiswa.madusem.print', ['madusemId' => $madusem->id]) }}"
                                                            class="btn btn-primary btn-sm" title="Unduh"><i
                                                                class="fa-solid fa-download"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{ $madusem->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan Catatan Revisi
                                                    </h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal"
                                                        aria-label="Close">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="{{ route('backend.dosen.daftar-mahasiswa.madusem.store') }}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="hidden" name="madusem_id"
                                                            value="{{ $madusem->id }}">
                                                        <div class="mb-3">
                                                            <label for="keterangan" class="form-label">Catatan
                                                                Revisi:</label>
                                                            <textarea type="longtext" class="form-control" id="keterangan" name="keterangan" rows="3">{{ $madusem->keterangan }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="tanggal_selesai" class="form-label">Tanggal
                                                                Pengumpulan:</label>
                                                            <input type="date" class="form-control" id="tanggal_selesai"
                                                                name="tanggal_selesai"
                                                                value="{{ $madusem->tanggal_selesai }}" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
