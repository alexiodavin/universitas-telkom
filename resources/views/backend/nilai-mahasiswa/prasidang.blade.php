@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Daftar Mahasiswa Prasidang</h1>
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
                                <table id="table-prasidang" class="table table-hover borderless" style="width: 100%; border: 0;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th>Nama Mahasiswa</th>
                                            <th style="width: 150px;">NIM</th>
                                            <th style="width: 150px;">Judul</th>
                                            <th style="width: 150px;">Title</th>
                                            <th style="width: 150px;">PBB 1</th>
                                            <th style="width: 150px;">PBB 2</th>
                                            <th style="width: 150px;">PUJ 1</th>
                                            <th style="width: 150px;">PUJ 2</th>
                                            <th style="width: 150px;">Status</th>
                                            <th style="width: 75px; text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($items as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->mahasiswa->nama }}</td>
                                                <td>{{ $item->mahasiswa->nim }}</td>
                                                <td>{{ $item->judul_indo }}</td>
                                                <td>{{ $item->judul_inggris }}</td>
                                                <td>{{ $item->pembimbing1->kode }}</td>
                                                <td>{{ $item->pembimbing2->kode }}</td>
                                                <td>{{ $item->penguji1->kode }}</td>
                                                <td>{{ $item->penguji2->kode }}</td>
                                                <td>
                                                    @php
                                                        $penguji = $auth_dosen_id == $item->penguji1->id ? 'penguji1' : ($auth_dosen_id == $item->penguji2->id ? 'penguji2' : null);
                                                        $approved = 'Belum Approved';
                                                        if ($penguji) {
                                                            $approved = $item->{'nilaipenguji' . substr($penguji, -1)} == null ? 'Belum Approved' : 'Approved';
                                                        }
                                                    @endphp
                                                    {{ $approved }}
                                                </td>
                                                <td style="text-align: center">
                                                    <a href="{{ route('backend.dosen.nilai-mahasiswa.prasidang.edit', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary"> <i class="fa fa-edit"></i> Edit</a>
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
            window.location.href = "{{ route('backend.admin.nilai-mutu') }}" + '?periode=' + this.value
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#table-prasidang').DataTable({
                "lengthMenu": [10, 25, 50, 100],
            });
            var filterWrapper = $('<div class="form-group"></div>').appendTo('#table-prasidang_wrapper .dataTables_length');
            $('<label for="approved-filter" class="mr-1 mt-1"">Filter </label>').appendTo(filterWrapper);
            var approvedFilter = $('<select id="approved-filter" class="form-control form-control-sm"><option value="">All</option><option value="Approved">Approved</option><option value="Belum Approved">Belum Approved</option></select>')
                .appendTo(filterWrapper)
                .on('change', function() {
                    var filterValue = $(this).val();
                    table.column(9).search(filterValue === "Approved" ? "^Approved$" : (filterValue === "Belum Approved" ? "^(?!Approved).*$" : ""), true, false).draw();
                });
        });
    </script>
@endsection
