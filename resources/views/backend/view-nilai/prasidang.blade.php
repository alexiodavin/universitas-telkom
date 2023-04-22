@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Nilai Prasidang Mahasiswa</h1>
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
                                <select name="periode_id" onchange="getDataTable(this.value)" class="form-control col-2"
                                    style="float: right">
                                    @foreach ($periodes as $periode)
                                        <option value="{{ $periode->id }}">{{ $periode->tahun_ajaran }} -
                                            {{ $periode->semester }} - {{ $periode->bulan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-hover borderless" style="width: 100%; border: 0;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th style="width: 150px;">NIM</th>
                                            <th style="width: 150px">Nama Mahasiswa</th>
                                            <th style="width: 150px;">Judul</th>
                                            <th style="width: 150px;">Title</th>
                                            <th style="width: 75px;">PBB 1</th>
                                            <th style="width: 75px;">PBB 2</th>
                                            <th style="width: 75px;">PUJ 1</th>
                                            <th style="width: 75px;">PUJ 2</th>
                                            <th style="width: 75px;">Periode</th>
                                            <th style="width: ">Nilai dari</th>
                                            <th style="width: 50px;">Nilai</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($items as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->prasidang->mahasiswa->nim }}</td>
                                                <td>{{ $item->prasidang->mahasiswa->nama }}</td>
                                                <td>{{ $item->prasidang->judul_indo }}</td>
                                                <td>{{ $item->prasidang->judul_inggris }}</td>
                                                <td>{{ $item->prasidang->pembimbing1->kode }}</td>
                                                <td>{{ $item->prasidang->pembimbing2->kode }}</td>
                                                <td>{{ $item->prasidang->penguji1->kode }}</td>
                                                <td>{{ $item->prasidang->penguji2->kode }}</td>
                                                <td>{{ $item->prasidang->tahun_ajaran }} {{ $item->prasidang->semester }}
                                                </td>
                                                <td>Penguji {{ $item->penguji }}</td>
                                                <td>{{ $item->nilai_akhir }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if (session('auth_login') == 'koordinator_pa')
                                    <a href="{{ route('backend.koordinator-pa.view-nilai-prasidang.download') }}"
                                        class="btn btn-primary shadow bg-primary float-right mt-3">Download</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        const getDataTable = (e) => {
            //   console.log(e);
            $.ajax({
                url: '/koordinator-pa/view-nilai-prasidang',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'periode_id': e
                },
                dataType: 'json',
                success: function(response) {
                    //   console.log(response.items);
                    const tbody = document.querySelector('tbody');
                    tbody.innerHTML = ``;
                    let i = 1;

                    response.items.forEach(element => {
                        tbody.innerHTML += `
                    <tr>
                        <td>${i}</td>
                        <td>${element.prasidang.mahasiswa.nim}</td>
                        <td>${element.prasidang.mahasiswa.nama}</td>
                        <td>${element.prasidang.judul_indo}</td>
                        <td>${element.prasidang.judul_inggris}</td>
                        <td>${element.prasidang.pembimbing1.kode}</td>
                        <td>${element.prasidang.pembimbing2.kode}</td>
                        <td>${element.prasidang.penguji1.kode}</td>
                        <td>${element.prasidang.penguji2.kode}</td>
                        <td>${element.prasidang.tahun_ajaran} ${ element.prasidang.semester }</td>
                        <td>Penguji ${element.penguji}</td>
                        <td>${element.nilai_akhir}</td>
                    </tr>
                    `
                        i++;
                    });
                },
                error: function(err) {

                }
            })
        }
    </script>
@endsection
