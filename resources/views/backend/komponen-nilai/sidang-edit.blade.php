@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <center>
                    <h1 class="m-0 text-dark font-weight-bold">Edit Komponen Nilai</h1>
                </center>
            </div>
        </div>

        <form action="{{ route('backend.koordinator-pa.komponen-nilai.sidang.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <section class="content ml-4 mr-4 mb-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <table class="table table-hover border" style="width: 100%; border: 0; ">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center; width: 600px;">Nama Komponen Nilai</th>
                                                <th style="text-align: center; width: 600px;">Diambil Dari</th>
                                                <th style="text-align: center; border-left: 2px solid #dee2e6; width: 200px;">Nilai Maksimal</th>
                                                <th style="text-align: center; border-left: 2px solid #dee2e6;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($komponen_sidangs as $kn)
                                                <tr>
                                                    <td style="border-right: 2px solid #dee2e6;">
                                                        <input type="text" name="nama_komponen[]" class="form-control" value="{{ $kn->nama_komponen }}" required>
                                                    </td>
                                                    <td style="border-right: 2px solid #dee2e6;">
                                                        <select name="keterangan[]" class="form-control">
                                                            <option value="">Pilih Diambil Dari</option>
                                                            <option value="Nilai Proposal" @if($kn->keterangan == 'Nilai Proposal') selected @endif>Nilai Proposal</option>
                                                            <option value="Nilai Prasidang" @if($kn->keterangan == 'Nilai Prasidang') selected @endif>Nilai Prasidang</option>
                                                            <option value="Nilai baru" @if($kn->keterangan == 'Nilai baru') selected @endif>Nilai baru</option>
                                                        </select>
                                                        {{-- <input type="text" name="keterangan[]" class="form-control" value="{{ $kn->keterangan }}"> --}}
                                                    </td>
                                                    <td style="border-right: 2px solid #dee2e6; text-align: center;">
                                                        <input type="number" name="persentase[]" class="form-control hitung" value="{{ $kn->persentase }}" required>
                                                    </td>
                                                    <td style="border-right: 2px solid #dee2e6; text-align: center;">
                                                        <a href="{{ route('backend.koordinator-pa.komponen-nilai.sidang.delete', ['id' => $kn->id]) }}" class="btn btn-primary shadow bg-primary" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')"> <i class="fa fa-trash"></i> Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="4">
                                                    <center>
                                                        <b>Total Nilai : {{ $total_komponen_sidang }}</b>
                                                    </center>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <button type="button" onclick="hitung()" class="float-right btn btn-primary">Hitung</button>
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
                                    <form action="{{ route('backend.koordinator-pa.komponen-nilai.sidang.update-deadline') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Periode </label>
                                            <div class="col-sm-10">
                                                <select id="periode_id" name="periode_id" class="form-control">
                                                    @foreach ($periodes as $periode)
                                                        <option value="{{ $periode->id }}" @if($periode_id == $periode->id) selected @endif>{{ $periode->tahun_ajaran }} - {{ $periode->semester }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Tanggal Deadline</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="tanggal_deadline_input_nilai" class="form-control" value="{{ $item->tanggal_deadline_input_nilai ?? '' }}">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="periode_id" value="{{ $periode_id }}">
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </div>
            </section>
        </form>
    </div>
    <br>
@endsection

@section('js')
    <script>
        $('#periode_id').on('change', function() {
            return window.location.href = "{{ url('koordinator-pa/komponen-nilai/sidang/edit') }}/"+this.value
        });

        function hitung(){
            var sum = 0;
            $('.hitung').each(function(){
                sum = parseInt(sum) + parseInt($(this).val())
            });
            
            swal.fire({
                title: 'Info!',
                text: "Total Nilai "+sum,
                icon: 'info',
                confirmButtonColor: '#b6252a',
            })
        }
    </script>
@endsection