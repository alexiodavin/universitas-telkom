@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <center>
                    <h1 class="m-0 text-dark text-bold">Form Berita Acara Prasidang</h1>
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
                                        <span class="form-control-plaintext">: {{ $item->mahasiswa->mahasiswa_import->prodi->nama }}</span>
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
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Ruangan</label>
                                    <div class="col-sm-10">
                                        @if($item->jadwal_prasidang)
                                            <span class="form-control-plaintext">: @if(str_contains($item->jadwal_prasidang->ruangan ?? '', 'http')) Online @else {{ $item->jadwal_prasidang->ruangan }} @endif</span>
                                        @else
                                            <span class="form-control-plaintext">: -</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Tanggal & Jam </label>
                                    <div class="col-sm-10">
                                        @if($item->jadwal_prasidang)
                                            <span class="form-control-plaintext">: {{ date('d/m/Y', strtotime($item->jadwal_prasidang->tanggal_prasidang)) }} Jam {{ date('H:i', strtotime($item->jadwal_prasidang->jam_mulai_prasidang)) }} - {{ date('H:i', strtotime($item->jadwal_prasidang->jam_selesai_prasidang)) }} WIB</span>
                                        @else
                                            <span class="form-control-plaintext">: -</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Jumlah Penguji </label>
                                    <div class="col-sm-10">
                                        <span class="form-control-plaintext">: {{ $item->jumlah_penguji }}</span>
                                    </div>
                                </div>
                                @if($item->jadwal_prasidang)
                                    @if($item->jadwal_prasidang->ruangan_id == null)
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Link Zoom</label>
                                            <div class="col-sm-10">
                                                <span class="form-control-plaintext">: <a target="_blank" href="{{ $item->jadwal_prasidang->ruangan }}">{{ $item->jadwal_prasidang->ruangan }}</a></span>
                                            </div>
                                        </div>
                                    @endif
                                @endif
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
                                <form action="{{ route('backend.dosen.nilai-mahasiswa.prasidang.update-nilai', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                                    {{-- @csrf
                                    <table class="table table-hover border" style="width: 100%; border: 0; ">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" style="text-align: center; width: 500px;">Komponen Penilaian<br><br></th>
                                                <th rowspan="2" style="text-align: center; border-left: 2px solid #dee2e6; width: 500px;">Nilai Maksimal<br><br></th>
                                                <th style="text-align: center; border-left: 2px solid #dee2e6;">Nilai Penguji</th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: center; border-left: 2px solid #dee2e6;">
                                                    @if ($item->penguji1_id == auth()->user()->dosen->id)
                                                        1
                                                    @elseif ($item->penguji2_id == auth()->user()->dosen->id)
                                                        2
                                                    @endif
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($items as $kn)
                                                <tr>
                                                    <td style="border-right: 2px solid #dee2e6;">KN {{ $no++ }} {{ $kn->nama_komponen }}</td>
                                                    <td style="border-right: 2px solid #dee2e6; text-align: center;">{{ $kn->persentase }}</td>
                                                    <td>
                                                        @if ($item->penguji1_id == auth()->user()->dosen->id)
                                                            @if($item->nilai_penguji1)
                                                                @foreach ($item->nilai_penguji1->detail_nilai as $nilai)
                                                                    @if($kn->id == $nilai->komponen_prasidang_id)
                                                                        <input type="number" name="nilai[]" class="form-control" value="{{ $nilai->nilai }}" readonly>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <input type="number" name="nilai[]" class="form-control" value="0" required>
                                                            @endif
                                                        @elseif ($item->penguji2_id == auth()->user()->dosen->id)
                                                            @if($item->nilai_penguji2)
                                                                @foreach ($item->nilai_penguji2->detail_nilai as $nilai)
                                                                    @if($kn->id == $nilai->komponen_prasidang_id)
                                                                        <input type="number" name="nilai[]" class="form-control" value="{{ $nilai->nilai }}" readonly>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <input type="number" name="nilai[]" class="form-control" value="0" required>
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if ($item->penguji1_id == auth()->user()->dosen->id)
                                        @if($item->nilai_penguji1 == null)
                                            <button class="btn btn-primary float-right">Simpan Nilai</button>
                                        @endif
                                    @elseif ($item->penguji2_id == auth()->user()->dosen->id)
                                        @if($item->nilai_penguji2 == null)
                                            <button class="btn btn-primary float-right">Simpan Nilai</button>
                                        @endif
                                    @endif --}}
                                    @csrf
                                    <table class="table table-borderless" style="width: 50%; border: 0; ">
                                        <thead>
                                            <tr>
                                                <th style="">Komponen Penilaian</th>
                                                <th style="text-align: center; ">Nilai Penguji {{ $item->penguji1_id == auth()->user()->dosen->id ? 1 : 2}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($items as $kn)
                                                <tr>
                                                    <td style="padding-top:1rem">KN {{ $no++ }} {{ $kn->nama_komponen }} <span style="color: red">*</span></td>
                                                    
                                                    <td>
                                                        @if ($item->penguji1_id == auth()->user()->dosen->id)
                                                            @if($item->nilai_penguji1)
                                                                @foreach ($item->nilai_penguji1->detail_nilai as $nilai)
                                                                    @if($kn->id == $nilai->komponen_prasidang_id)
                                                                        <input type="number" name="nilai[]" class="form-control" value="{{ $nilai->nilai }}" readonly>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <input type="number" name="nilai[]" class="form-control" required min="0" max="{{ $kn->persentase }}">
                                                            @endif
                                                        @elseif ($item->penguji2_id == auth()->user()->dosen->id)
                                                            @if($item->nilai_penguji2)
                                                                @foreach ($item->nilai_penguji2->detail_nilai as $nilai)
                                                                    @if($kn->id == $nilai->komponen_prasidang_id)
                                                                        <input type="number" name="nilai[]" class="form-control" value="{{ $nilai->nilai }}" readonly >
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <input type="number" name="nilai[]" class="form-control" required min="0" max="{{ $kn->persentase }}">
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td style=" text-align: center; padding-top:1rem">Maks : {{ $kn->persentase }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
                                    <div id="nilai_sementara" style="padding: 0.75rem; font-weight:600"></div>
                                    @if ($item->penguji1_id == auth()->user()->dosen->id)
                                    @if($item->nilai_penguji1 == null)
                                    <button class="btn btn-primary float-right">Simpan Nilai</button>
                                    <button class="btn btn-primary float-right" onclick="hitungNilai()" type="button" style="margin: 0 25px">Hitung Nilai</button>
                                    @endif
                                    @if ($item->nilai_penguji1)
                                        <button class="btn btn-primary float-right" id="1" onclick="editNilai(this.id)" type="button" style="margin: 0 25px 0 0">Edit Nilai</button>
                                    @endif
                                    @elseif ($item->penguji2_id == auth()->user()->dosen->id)
                                    @if($item->nilai_penguji2 == null)
                                    <button class="btn btn-primary float-right">Simpan Nilai</button>
                                    <button class="btn btn-primary float-right" onclick="hitungNilai()" type="button" style="margin: 0 25px">Hitung Nilai</button>
                                    @endif
                                    @if ($item->nilai_penguji2)
                                        <button class="btn btn-primary float-right" id="2" onclick="editNilai(this.id)" type="button" style="margin: 0 25px 0 0">Edit Nilai</button>
                                    @endif
                                    @endif
                                </form>
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
                                @php
                                    $nilai_akhir = Session::get('nilai_akhir');
                                @endphp
                                @if ($nilai_akhir)
                                <b>Total : {{$nilai_akhir}}</b>
                                @else
                                <b>Total : {{ $nilai_total->nilai_akhir ?? null }}</b>
                                @endif
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
                                <h4>Catatan Revisi Prasidang</h4>
                                <table class="table table-hover border" style="width: 100%; border: 0; ">
                                    <tbody>
                                        <tr>
                                            <form action="{{ route('backend.dosen.nilai-mahasiswa.prasidang.update', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <td style="border-right: 2px solid #dee2e6;" class='col-8'>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label font-weight-bold">Penguji 1 <span style="color: red">*</span></label>
                                                        <div class="col-sm-10">
                                                            <div class="d-flex flex-row">
                                                                <input type="file" name="file" accept=".pdf,.doc,.docx" class="w-50 form-control" @if($item->penguji1_id != auth()->user()->dosen->id) disabled @endif>
                                                            </div>
                                                            <i>Format file .docx, .pdf, .doc</i>
                                                        </div>
                                                    </div>
                                                     @if ($item->nilai_penguji1->file ?? null)
                                                        @if ($item->penguji1_id == auth()->user()->dosen->id)
                                                        <a target="_blank" href="{{ asset('file/'.$item->nilai_penguji1->file) }}" class="btn btn-primary">Lihat File</a>
                                                        <br><br>
                                                        @endif
                                                    @endif
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2 col-form-label font-weight-bold">Catatan <span style="color: red">*</span></label>
                                                        <textarea name="catatan" class="form-control" style="margin: 0 7.5px; width:94%"  @if($item->penguji1_id != auth()->user()->dosen->id) disabled @endif>{{ $item->nilai_penguji1->catatan ?? '' }}</textarea>
                                                    </div>
                                                </td>
                                                <td style="border-right: 2px solid #dee2e6; text-align: center;">
                                                    <center>
                                                        <br><br>
                                                        <h4>Penguji 1</h4>
                                                        <br>
                                                        @if($item->nilai_penguji1)
                                                            @if($item->nilaipenguji1->tanggal_penilaian)
                                                                <span>
                                                                    <b>
                                                                        Sudah Disetujui<br>
                                                                        {{ date('d/m/Y H:i', strtotime($item->nilai_penguji1->tanggal_penilaian)).' WIB' }}
                                                                    </b>
                                                                </span>
                                                            @else
                                                                <button type="submit" class="btn btn-primary" @if ($item->penguji1_id != auth()->user()->dosen->id) disabled @endif>Approve</button>
                                                            @endif
                                                        @else
                                                            <button type="submit" class="btn btn-primary" @if ($item->penguji1_id != auth()->user()->dosen->id) disabled @endif>Approve</button>
                                                        @endif
                                                    </center>
                                                </td>
                                            </form>
                                        </tr>
                                        @if($item->jumlah_penguji == 2)
                                            <tr>
                                                <form action="{{ route('backend.dosen.nilai-mahasiswa.prasidang.update', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <td style="border-right: 2px solid #dee2e6;" class='col-8'>
                                                        <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label font-weight-bold">Penguji 2 <span style="color: red">*</span></label>
                                                        <div class="col-sm-10">
                                                            <div class="d-flex flex-row">
                                                                <input type="file" name="file" accept=".pdf,.doc,.docx" class="w-50 form-control" @if($item->penguji2_id != auth()->user()->dosen->id) disabled @endif>
                                                            </div>
                                                            <i>Format file .docx, .pdf, .doc</i>
                                                        </div>
                                                        </div>
                                                        @if ($item->nilai_penguji2->file ?? null)
                                                            @if ($item->penguji2_id == auth()->user()->dosen->id)
                                                            <a target="_blank" href="{{ asset('file/'.$item->nilai_penguji2->file) }}" class="btn btn-primary">Lihat File</a>
                                                            <br><br>
                                                            @endif
                                                        @endif
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-2 col-form-label font-weight-bold">Catatan <span style="color: red">*</span></label>
                                                            <textarea name="catatan" class="form-control" style="margin: 0 7.5px; width:94%"  @if($item->penguji2_id != auth()->user()->dosen->id) disabled @endif>{{ $item->nilai_penguji2->catatan ?? '' }}</textarea>
                                                        </div>
                                                    </td>
                                                    <td style="border-right: 2px solid #dee2e6; text-align: center;">
                                                        <center>
                                                            <br><br>
                                                            <h4>Penguji 2</h4>
                                                            <br>
                                                            @if($item->nilai_penguji2)
                                                                @if($item->nilaipenguji2->tanggal_penilaian)
                                                                    <span>
                                                                        <b>
                                                                            Sudah Disetujui<br>
                                                                            {{ date('d/m/Y H:i', strtotime($item->nilai_penguji2->tanggal_penilaian)).' WIB' }}
                                                                        </b>
                                                                    </span>
                                                                @else
                                                                    <button type="submit" class="btn btn-primary" @if ($item->penguji2_id != auth()->user()->dosen->id) disabled @endif>Approve</button>
                                                                @endif
                                                            @else
                                                                <button type="submit" class="btn btn-primary" @if ($item->penguji2_id != auth()->user()->dosen->id) disabled @endif>Approve</button>
                                                            @endif
                                                        </center>
                                                    </td>
                                                </form>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <br>
                                @if($nilai_final)
                                <div class="row">
                                    <div class="col-3" style="padding-left: 1rem">
                                        <b>Nilai akhir : {{ $nilai_final->nilai_final }}</b>
                                    </div>
                                    <div class="col-6" style="text-align: right;">
                                        <b>Nilai Mutu : 
                                            @if ($nilai_final->nilai_final >= 80)
                                                A
                                            @elseif($nilai_final->nilai_final >= 70 && $nilai_final->nilai_final < 80)
                                                AB
                                            @elseif($nilai_final->nilai_final >= 65 && $nilai_final->nilai_final < 70)
                                                B
                                            @elseif($nilai_final->nilai_final >= 60 && $nilai_final->nilai_final < 65)
                                                BC
                                            @elseif($nilai_final->nilai_final >= 50 && $nilai_final->nilai_final < 60)
                                                C
                                            @elseif($nilai_final->nilai_final >= 40 && $nilai_final->nilai_final < 50)
                                                D
                                            @elseif($nilai_final->nilai_final >= 0 && $nilai_final->nilai_final < 40)
                                                E
                                            @endif
                                        </b>
                                    </div>
                                    <div class="col-3" style="text-align: right; padding-right: 1rem;">
                                        <b>Status : {{ $nilai_final->nilai_final > 50 ? 'Lulus' : 'Tidak Lulus' }}</b>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <center>
            @if($item->nilai_final == null)
                @if($item->nilai_penguji1 && $item->nilai_penguji2)
                    <a href="{{ route('backend.dosen.nilai-mahasiswa.prasidang.set-nilai-akhir', ['id' => $item->id]) }}" class="btn btn-primary">Simpan Nilai Akhir</a>
                    <br><br>
                @endif
            @endif
        </center>
    </div>
    <div id="item_id" class="{{ $item->id }}" >{{ $item->id }}</div>
    <script>
        const hitungNilai = () =>{
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

        const editNilai = (e) =>{
            const id = document.querySelector('#item_id').innerText;
            // console.log(id);
            $.ajax({
             url:'/dosen/nilai-mahasiswa/prasidang/{id}/update-nilai',
             type:'POST',
             data: {'id': id, 'penguji': e, '_token': '{{ csrf_token() }}'},
             dataType:'json',
             success:function(response){
                console.log(response);
                window.location.href = `/dosen/nilai-mahasiswa/prasidang/${response.id}/edit`
             },error:function(err){

             }
          })
        }
    </script>
@endsection