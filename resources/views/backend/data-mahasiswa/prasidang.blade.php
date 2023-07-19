@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Mahasiswa Prasidang</h1>
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
                                <table id="table-prasidang-kaprodi" class="table table-hover borderless" style="width: 100%; border: 0;">
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
                                            <th style="width: 125px;" class="invisible">Tahun</th>
                                            <th style="width: 150px;">Progress Mahasiswa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                            $filterOptions = [];
                                        @endphp
                                        @foreach ($items as $item)
                                            @php
                                                $tahunSemester = $item->tahun_ajaran . ' - ' . $item->semester;
                                                if (!in_array($tahunSemester, $filterOptions)) {
                                                    $filterOptions[] = $tahunSemester;
                                                }
                                            @endphp
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->mahasiswa->nim }}</td>
                                                <td>{{ $item->mahasiswa->nama }}</td>
                                                <td>{{ $item->judul_indo }}</td>
                                                <td>{{ $item->pembimbing1->nama_gelar }}</td>
                                                <td>{{ $item->pembimbing2->nama_gelar }}</td>
                                                <td>{{ $item->penguji1->nama_gelar }}</td>
                                                <td>{{ $item->penguji2->nama_gelar }}</td>
                                                <td class="invisible">{{ $tahunSemester }}</td>
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
        $(document).ready(function() {
            var table = $('#table-prasidang-kaprodi').DataTable({
                "lengthMenu": [10, 25, 50, 100],
            });
            table.column(8).visible(false);
            var filterWrapper = $('<div class="form-group"></div>').appendTo('#table-prasidang-kaprodi_wrapper .dataTables_length');
            $('<label for="year-filter" class="mr-1 mt-1">Filter</label>').appendTo(filterWrapper);
            var approvedFilter = $('<select id="year-filter" class="form-control form-control-sm"><option value="">All</option></select>')
                .appendTo(filterWrapper);

            var filterOptions = @json($filterOptions);
            filterOptions.sort();

            filterOptions.forEach(function(option) {
                $('<option value="' + option + '">' + option + '</option>').appendTo(approvedFilter);
            });

            approvedFilter.on('change', function() {
                var filterValue = $(this).val();
                console.log(filterValue);
                table.column(8).search(filterValue).draw();
            });
        });
    </script>
@endsection
