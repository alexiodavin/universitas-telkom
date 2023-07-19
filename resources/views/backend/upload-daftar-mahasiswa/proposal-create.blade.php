@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">* Silahkan Malakukan Input / Upload Data Mahasiswa</h1>
                <h1 class="m-0 text-dark">* Pilih Salah Satu : Input Data / Upload Data</h1>
                <hr>
                <h1 class="m-0 text-dark">Input Daftar Mahasiswa (Proposal) </h1>
            </div>
        </div>

        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <form action="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.proposal.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Periode<span
                                                style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            {{-- <select name="periode_id" class="form-control" required>
                                                <option value="">Pilih Periode</option>
                                                @foreach ($periodes as $periode)
                                                    <option value="{{ $periode->id }}">{{ $periode->tahun_ajaran }} -
                                                        {{ $periode->semester }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('periode_id'))
                                                <span style="color:red;">{{ $errors->first('periode_id') }}</span>
                                            @endif --}}
                                            <select name="tahun_ajaran" class="form-control my-2" required>
                                                <option value="">Pilih Tahun Ajaran</option>
                                                @foreach ($list_tahun_ajaran as $tahun_ajaran)
                                                    <option value="{{ $tahun_ajaran->tahun_ajaran }}">
                                                        {{ $tahun_ajaran->tahun_ajaran }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('tahun_ajaran'))
                                                <span style="color:red;">{{ $errors->first('tahun_ajaran') }}</span>
                                            @endif
                                            <select name="semester" id="semester" class="form-control my-2" required>
                                                <option value="">Pilih Semester</option>
                                                <option value="Ganjil">Ganjil</option>
                                                <option value="Genap">Genap</option>
                                            </select>
                                            @if ($errors->has('semester'))
                                                <span style="color:red;">{{ $errors->first('semester') }}</span>
                                            @endif
                                            <select name="bulan" id="bulan" class="form-control my-2" required disabled>
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
                                                <option value="Desember">Desember</option>
                                            </select>
                                            @if ($errors->has('bulan'))
                                                <span style="color:red;">{{ $errors->first('bulan') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Nama Mahasiswa<span
                                                style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select name="mahasiswa_id" class="form-control select2bs4" required>
                                                <option value="">Pilih Nama Mahasiswa</option>
                                                @foreach ($mahasiswas as $mahasiswa)
                                                    <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nama }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('mahasiswa_id'))
                                                <span style="color:red;">{{ $errors->first('mahasiswa_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Judul PA<span
                                                style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="judul_indo"
                                                value="{{ old('judul_indo') }}" required>
                                            @if ($errors->has('judul_indo'))
                                                <span style="color:red;">{{ $errors->first('judul_indo') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Title<span
                                                style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="judul_inggris"
                                                value="{{ old('judul_inggris') }}" required>
                                            @if ($errors->has('judul_inggris'))
                                                <span style="color:red;">{{ $errors->first('judul_inggris') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Pembimbing 1<span
                                                style="color:red;"> *</span></label>
                                        <div class="col-sm-2">
                                            <select name="pembimbing1_id" id="pembimbing1_id"
                                                class="form-control select2bs4" required
                                                onchange="showPembimbing1(this.value)">
                                                <option value="">Pilih Nama Pembimbing 1</option>
                                                @foreach ($pembimbing_1 as $dosen)
                                                    <option value="{{ $dosen->id }}">{{ $dosen->kode }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('pembimbing1_id'))
                                                <span style="color:red;">{{ $errors->first('pembimbing1_id') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-sm-2 ms-2 pt-1">
                                            <div id="nama_pembimbing_1" class="m-auto"
                                                style="font-weight: 700; font-size: inherit;"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Pembimbing 2<span
                                                style="color:red;"> *</span></label>
                                        <div class="col-sm-2">
                                            <select name="pembimbing2_id" id="pembimbing2_id"
                                                class="form-control select2bs4" required
                                                onchange="showPembimbing2(this.value)">
                                                <option value="">Pilih Nama Pembimbing 2</option>
                                            </select>
                                            @if ($errors->has('pembimbing2_id'))
                                                <span style="color:red;">{{ $errors->first('pembimbing2_id') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-sm-2 ms-2 pt-1">
                                            <div id="nama_pembimbing_2" class="m-auto"
                                                style="font-weight: 700; font-size: inherit;"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Penguji 1<span
                                                style="color:red;"> *</span></label>
                                        <div class="col-sm-2">
                                            <select name="penguji1_id" class="form-control select2bs4" required
                                                onchange="showPenguji1(this.value)">
                                                <option value="">Pilih Nama Penguji 1</option>
                                                @foreach ($dosens as $dosen)
                                                    <option value="{{ $dosen->id }}">{{ $dosen->kode }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('penguji1_id'))
                                                <span style="color:red;">{{ $errors->first('penguji1_id') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-sm-2 ms-2 pt-1">
                                            <div id="nama_penguji_1" class="m-auto"
                                                style="font-weight: 700; font-size: inherit;"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Penguji 2<span
                                                style="color:red;"> *</span></label>
                                        <div class="col-sm-2">
                                            <select name="penguji2_id" id="opsi_penguji2" class="form-control select2bs4"
                                                required onchange="showPenguji2(this.value)">
                                                <option value="">Pilih Nama Penguji 2</option>

                                            </select>
                                            @if ($errors->has('penguji2_id'))
                                                <span style="color:red;">{{ $errors->first('penguji2_id') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-sm-2 ms-2 pt-1">
                                            <div id="nama_penguji_2" class="m-auto"
                                                style="font-weight: 700; font-size: inherit;"></div>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary btn-save shadow bg-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">Upload Daftar Mahasiswa (Proposal) </h1>
            </div>
        </div>

        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <form
                                    action="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.proposal.upload') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Download File</label>
                                        <div class="col-sm-10">
                                            <a class="btn btn-primary"
                                                href="{{ asset('file/template_daftar_mahasiswa_proposal.xlsx') }}"
                                                download>Template Excel</a>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#periodeModal">List Periode</button>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#mahasiswaModal">List Mahasiswa</button>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#dosenModal">List Dosen</button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Upload File <span
                                                style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control-file" name="file" required>
                                            @if ($errors->has('file'))
                                                <span style="color:red;">{{ $errors->first('file') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary btn-save shadow bg-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="periodeModal" tabindex="-1" role="dialog" aria-labelledby="periodeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">List Periode</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover border" style="width: 100%; border: 0;">
                        <thead>
                            <tr>
                                <th style="width: 10px; border-right: 2px solid #dee2e6;">ID</th>
                                <th style="border-right: 2px solid #dee2e6;">Tahun Ajaran</th>
                                <th style="border-right: 2px solid #dee2e6;">Semester</th>
                                <th style="border-right: 2px solid #dee2e6;">Bulan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($periodes as $periode)
                                <tr>
                                    <td style="border-right: 2px solid #dee2e6;">{{ $periode->id }}</td>
                                    <td style="border-right: 2px solid #dee2e6;">{{ $periode->tahun_ajaran }}</td>
                                    <td style="border-right: 2px solid #dee2e6;">{{ $periode->semester }}</td>
                                    <td style="border-right: 2px solid #dee2e6;">{{ $periode->bulan }}</td>
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

    <div class="modal fade" id="mahasiswaModal" tabindex="-1" role="dialog" aria-labelledby="mahasiswaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">List Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover border" style="width: 100%; border: 0;">
                        <thead>
                            <tr>
                                <th style="width: 10px; border-right: 2px solid #dee2e6;">ID</th>
                                <th style="border-right: 2px solid #dee2e6;">NIM</th>
                                <th style="border-right: 2px solid #dee2e6;">Nama Mahasiswa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswas as $mahasiswa)
                                <tr>
                                    <td style="border-right: 2px solid #dee2e6;">{{ $mahasiswa->id }}</td>
                                    <td style="border-right: 2px solid #dee2e6;">{{ $mahasiswa->nim }}</td>
                                    <td style="border-right: 2px solid #dee2e6;">{{ $mahasiswa->nama }}</td>
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
                            @foreach ($dosens as $dosen)
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

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        const showPembimbing1 = (e) => {
            $.ajax({
                url: '/koordinator-pa/upload-daftar-mahasiswa/proposal/create',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'dosen_id_pbb1': e
                },
                dataType: 'json',
                success: function(response) {
                    // console.log(response.nama_dosen);
                    const namaP1 = document.querySelector('#nama_pembimbing_1');
                    namaP1.innerHTML = response.nama_dosen;

                    const opsiP2 = document.getElementById('pembimbing2_id');

                    response.dosen_pbb2_id.forEach(element => {
                        opsiP2.innerHTML += `
                    <option value="${element.id}">${element.kode}</option>
                    `;
                    });
                    console.log(opsiP2);




                    // console.log(namaP1);
                },
                error: function(err) {

                }
            })
        }

        const showPembimbing2 = (e) => {
            const namaP1 = document.querySelector('#pembimbing1_id');
            // console.log(namaP1);


            $.ajax({
                url: '/koordinator-pa/upload-daftar-mahasiswa/proposal/create',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'dosen_id_pbb2': e,
                },
                dataType: 'json',
                success: function(response) {
                    const namaP1 = document.querySelector('#nama_pembimbing_2');
                    namaP1.innerHTML = response.nama_dosen;

                    // console.log(namaP1);
                },
                error: function(err) {

                }
            })
        }

        const showPenguji1 = (e) => {
            $.ajax({
                url: '/koordinator-pa/upload-daftar-mahasiswa/proposal/create',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'dosen_id_penguji1': e
                },
                dataType: 'json',
                success: function(response) {
                    const namaP1 = document.querySelector('#nama_penguji_1');
                    namaP1.innerHTML = response.nama_dosen;
                    const opsiP2 = document.querySelector('#opsi_penguji2');

                    response.dosen_id_penguji2.forEach(element => {
                        opsiP2.innerHTML += `<option value="${element.id}">${element.kode}</option>`
                    });

                },
                error: function(err) {

                }
            })
        }

        const showPenguji2 = (e) => {
            $.ajax({
                url: '/koordinator-pa/upload-daftar-mahasiswa/proposal/create',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'dosen_id_penguji2': e
                },
                dataType: 'json',
                success: function(response) {
                    const namaP1 = document.querySelector('#nama_penguji_2');
                    namaP1.innerHTML = response.nama_dosen;

                    // console.log(namaP1);
                },
                error: function(err) {

                }
            })
        }
    </script>

    {{-- Start select bulan by semester --}}
    <script>
        $(document).ready(function() {
            $('#semester').change(function() {
                var selectedSemester = $(this).val();
                if (selectedSemester === 'Ganjil') {
                    $('#bulan').prop('disabled', false);
                    $('#bulan option').each(function() {
                        if ($(this).val() === 'Oktober' || $(this).val() === 'November' || $(this).val() === 'Desember' || $(this).val() === 'Januari' || $(this).val() === 'Februari' || $(this).val() === 'Maret') {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                } else if (selectedSemester === 'Genap') {
                    $('#bulan').prop('disabled', false);
                    $('#bulan option').each(function() {
                        if ($(this).val() === 'April' || $(this).val() === 'Mei' || $(this).val() === 'Juni' || $(this).val() === 'Juli' || $(this).val() === 'Agustus' || $(this).val() === 'September') {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                } else {
                    $('#bulan').prop('disabled', true);
                    $('#bulan option').hide();
                }
            });
        });
    </script>
@endsection
