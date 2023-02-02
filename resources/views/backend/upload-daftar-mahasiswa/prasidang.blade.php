@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @if(session('auth_login') == 'koordinator_pa')
                            <h1 class="m-0 text-dark">Data Mahasiswa Prasidang (Tahap 2)</h1>
                        @else
                            <h1 class="m-0 text-dark">Data Ruangan Prasidang</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            @if(session('auth_login') == 'koordinator_pa')
                                <div class="card-header">
                                    <h3 class="card-title"><a href="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang.create') }}" class="btn btn-primary shadow bg-primary"> <i class="fa fa-plus"></i> Tambah</a></h3>
                                </div>
                            @endif
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
                                            <th style="width: 75px;">Ket</th>
                                            @if (session('auth_login') != 'koordinator_pa')
                                                <th style="width: 150px;">Tanggal Prasidang</th>
                                                <th style="width: 150px;">Jam Mulai</th>
                                                <th style="width: 150px;">Jam Selesai</th>
                                                <th style="width: 150px;">Ruangan</th>
                                                <th style="width: 150px;">Link</th>
                                            @endif
                                            @if(session('auth_login') == 'koordinator_pa')
                                                <th style="width: 100px; text-align: center;">Aksi</th>
                                            @endif
                                            <th style="width: 100px; text-align: center;">Input Jadwal Prasidang</th>
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
                                                <td><input type="text" style="width: 75px" onkeyup="updateKeterangan(this)" name="{{ $item->id }}" value="{{old('keterangan', $item->keterangan)}}" placeholder="{{old('keterangan', $item->keterangan)}}"></td>
                                                @if (session('auth_login') != 'koordinator_pa')
                                                    <td>{{ $item->jadwal_prasidang->tanggal_prasidang ?? '-' }}</td>
                                                    <td>{{ $item->jadwal_prasidang->jam_mulai_prasidang ?? '-' }}</td>
                                                    <td>{{ $item->jadwal_prasidang->jam_selesai_prasidang ?? '-' }}</td>
                                                    @if($item->jadwal_prasidang)
                                                        <td>{{ $item->jadwal_prasidang->ruangan_id == null ? 'Online' : $item->jadwal_prasidang->ruangan }}</td>
                                                        <td><a target="_blank" href="{{ $item->jadwal_prasidang->ruangan_id == null ? $item->jadwal_prasidang->ruangan : '' }}">{{ $item->jadwal_prasidang->ruangan_id == null ? $item->jadwal_prasidang->ruangan : '' }}</a></td>
                                                    @else
                                                        <td>-</td>
                                                        <td>-</td>
                                                    @endif
                                                @endif
                                                @if(session('auth_login') == 'koordinator_pa')
                                                    <td style="text-align: center">
                                                        <a href="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang.edit', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary"> <i class="fa fa-edit"></i></a>
                                                        <a href="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang.delete', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')"> <i class="fa fa-trash"></i></a>
                                                    </td>
                                                @endif
                                                @if(session('auth_login') == 'koordinator_pa')
                                                    <td style="text-align: center">
                                                        <a href="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang.input-jadwal-prasidang', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary">Input</a>
                                                    </td>
                                                @else
                                                    <td style="text-align: center">
                                                        <a href="{{ route('backend.admin.upload-daftar-mahasiswa.prasidang.input-jadwal-prasidang', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary">Input</a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if(session('auth_login') == 'koordinator_pa')
                                    @if(\Route::currentRouteName() == 'backend.koordinator-pa.upload-daftar-mahasiswa.prasidang')
                                        <a href="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang.upload-jadwal') }}" class="btn btn-primary shadow bg-primary float-right mt-3 ml-3">Upload Jadwal Prasidang</a>
                                    @endif
                                    <a href="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang.download') }}" class="btn btn-primary shadow bg-primary float-right mt-3">Download</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        const updateKeterangan = (e) => {
            console.log(e.name);
            $.ajax({
                url:'/koordinator-pa/upload-daftar-mahasiswa/prasidang',
                type:'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'keterangan' : e.value,
                    'prasidang_id' : e.name
                },
                dataType:'json',
                success:function(response){
                    // console.log(response);

                },error:function(err){

                }
            })
            // e.preventDefault();
            
        }
    </script>

@endsection