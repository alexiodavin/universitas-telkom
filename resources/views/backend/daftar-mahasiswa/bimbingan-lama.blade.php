@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Daftar Mahasiswa Bimbingan</h1>
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
                                <table id="example1" class="table table-hover borderless"
                                    style="width: 100%; border: 0; margin: 0 auto;">
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
                                            <th style="width: 150px;">Progress Mahasiswa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($items as $item)
                                            @if ($item->proposal)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $item->proposal->mahasiswa->nim }}</td>
                                                    <td>{{ $item->proposal->mahasiswa->nama }}</td>
                                                    <td>{{ $item->proposal->judul_indo }}</td>
                                                    <td>{{ $item->proposal->judul_inggris }}</td>
                                                    <td>{{ App\Models\Dosen::where(['id' => $item->proposal->pembimbing1_id])->first()->kode }}
                                                    </td>
                                                    <td>{{ App\Models\Dosen::where(['id' => $item->proposal->pembimbing2_id])->first()->kode }}
                                                    </td>
                                                    <td>{{ App\Models\Dosen::where(['id' => $item->proposal->penguji1_id])->first()->kode }}
                                                    </td>
                                                    <td>{{ App\Models\Dosen::where(['id' => $item->proposal->penguji2_id])->first()->kode }}
                                                    </td>
                                                    <td>{{ $item->tipe }}</td>
                                                </tr>
                                            @elseif($item->prasidang)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $item->prasidang->mahasiswa->nim }}</td>
                                                    <td>{{ $item->prasidang->mahasiswa->nama }}</td>
                                                    <td>{{ $item->prasidang->judul_indo }}</td>
                                                    <td>{{ $item->prasidang->judul_inggris }}</td>
                                                    <td>{{ App\Models\Dosen::where(['id' => $item->prasidang->pembimbing1_id])->first()->kode }}
                                                    </td>
                                                    <td>{{ App\Models\Dosen::where(['id' => $item->prasidang->pembimbing2_id])->first()->kode }}
                                                    </td>
                                                    <td>{{ App\Models\Dosen::where(['id' => $item->prasidang->penguji1_id])->first()->kode }}
                                                    </td>
                                                    <td>{{ App\Models\Dosen::where(['id' => $item->prasidang->penguji2_id])->first()->kode }}
                                                    </td>
                                                    <td>{{ $item->tipe }}</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $item->sidang->mahasiswa->nim }}</td>
                                                    <td>{{ $item->sidang->mahasiswa->nama }}</td>
                                                    <td>{{ $item->sidang->judul_indo }}</td>
                                                    <td>{{ $item->sidang->judul_inggris }}</td>
                                                    <td>{{ App\Models\Dosen::where(['id' => $item->sidang->pembimbing1_id])->first()->kode }}
                                                    </td>
                                                    <td>{{ App\Models\Dosen::where(['id' => $item->sidang->pembimbing2_id])->first()->kode }}
                                                    </td>
                                                    <td>{{ App\Models\Dosen::where(['id' => $item->sidang->penguji1_id])->first()->kode }}
                                                    </td>
                                                    <td>{{ App\Models\Dosen::where(['id' => $item->sidang->penguji2_id])->first()->kode }}
                                                    </td>
                                                    <td>{{ $item->tipe }}</td>
                                                </tr>
                                            @endif
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
@endsection
