@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <center>
                    <h1 class="m-0 text-dark text-bold">Form Berita Acara Proposal</h1>
                </center>
            </div>
        </div>

        <section class="content ml-4 mr-4 mb-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h4>Data Mahasiswa dan Judul</h4>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <b>SEMESTER : {{ $item->periode->semester }}</b>
                                    </div>
                                    <div class="col-6">
                                        <b>TAHUN AJARAN : {{ $item->periode->tahun_ajaran }}</b>
                                    </div>
                                </div>
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
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">NIM</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->mahasiswa->nim }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->mahasiswa->nama }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Program Studi</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">:
                                            {{ $item->mahasiswa->mahasiswa_import->prodi->nama }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Judul PA</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->judul_indo }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Title</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->judul_inggris }}</span>
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Ruangan</label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->asd ?? '?' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Tanggal & Jam </label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->asd ?? '?' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Jumlah Penguji </label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->asd ?? '?' }}</span>
                                    </div>
                                </div> --}}
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
                                <form
                                    action="{{ route('backend.dosen.nilai-mahasiswa.proposal.update-detail-nilai', ['id' => $item->id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <table class="table table-borderless" style="width: 50%; border: 0; ">
                                        <thead>
                                            <tr>
                                                <th style="">Komponen Penilaian</th>
                                                <th style="text-align: center; ">Nilai Penguji
                                                    {{ $item->penguji1_id == auth()->user()->dosen->id ? 1 : 2 }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($items as $kn)
                                                <tr>
                                                    <td style="padding-top:1rem">KN {{ $no++ }}
                                                        {{ $kn->nama_komponen }} <span style="color: red">*</span></td>

                                                    <td>
                                                        @if ($item->penguji1_id == auth()->user()->dosen->id)
                                                            @if ($item->nilai_penguji1)
                                                                @foreach ($item->nilai_penguji1->detail_nilai as $nilai)
                                                                    @if ($kn->id == $nilai->komponen_proposal_id)
                                                                        <input type="number"
                                                                            name="nilai[{{ $nilai->id }}]"
                                                                            class="form-control"
                                                                            value="{{ $nilai->nilai }}">
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <input type="number" name="nilai[]" class="form-control"
                                                                    required min="0" max="{{ $kn->persentase }}">
                                                            @endif
                                                        @elseif ($item->penguji2_id == auth()->user()->dosen->id)
                                                            @if ($item->nilai_penguji2)
                                                                @foreach ($item->nilai_penguji2->detail_nilai as $nilai)
                                                                    @if ($kn->id == $nilai->komponen_proposal_id)
                                                                        <input type="number"
                                                                            name="nilai[{{ $nilai->id }}]"
                                                                            class="form-control"
                                                                            value="{{ $nilai->nilai }}">
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <input type="number" name="nilai[]" class="form-control"
                                                                    required min="0" max="{{ $kn->persentase }}">
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td style=" text-align: center; padding-top:1rem">Maks :
                                                        {{ $kn->persentase }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div id="nilai_sementara" style="padding: 0.75rem; font-weight:600"></div>
                                    @if ($item->penguji1_id == auth()->user()->dosen->id)
                                        @if ($item->nilai_penguji1 == null)
                                            <button class="btn btn-primary float-right">Simpan Nilai</button>
                                            <button class="btn btn-primary float-right" onclick="hitungNilai()"
                                                type="button" style="margin: 0 25px 0 0">Hitung Nilai</button>
                                        @endif
                                        @if ($item->nilai_penguji1)
                                            <button class="btn btn-primary float-right">Simpan Nilai</button>
                                        @endif
                                    @elseif ($item->penguji2_id == auth()->user()->dosen->id)
                                        @if ($item->nilai_penguji2 == null)
                                            <button class="btn btn-primary float-right">Simpan Nilai</button>
                                            <button class="btn btn-primary float-right" onclick="hitungNilai()"
                                                type="button" style="margin: 0 25px 0 0">Hitung Nilai</button>
                                        @endif
                                        @if ($item->nilai_penguji2)
                                            <button class="btn btn-primary float-right">Simpan Nilai</button>
                                        @endif
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="item_id" class="{{ $item->id }}">{{ $item->id }}</div>

    <script>
        const hitungNilai = () => {
            const input = document.getElementsByName('nilai[]');
            let total = 0;
            for (let i = 0; i < input.length; i++) {
                const element = input[i].value;
                total += parseInt(element);

                // console.log(element);
            }
            const nilai_sementara = document.querySelector('#nilai_sementara');
            nilai_sementara.innerText = `Total nilai sementara : ${total}`;

        }
    </script>
@endsection
