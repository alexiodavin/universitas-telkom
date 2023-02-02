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

        <form action="{{ route('backend.koordinator-pa.komponen-nilai.proposal.update') }}" method="POST" enctype="multipart/form-data">
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
                                                <th style="text-align: center; width: 1200px;">Nama Komponen Nilai</th>
                                                <th style="text-align: center; border-left: 2px solid #dee2e6; width: 200px;">Nilai Maksimal</th>
                                                <th style="text-align: center; border-left: 2px solid #dee2e6;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($komponen_proposals as $kn)
                                                <tr>
                                                    <td style="border-right: 2px solid #dee2e6;">
                                                        <input type="text" name="nama_komponen[]" class="form-control" value="{{ $kn->nama_komponen }}" required>
                                                    </td>
                                                    <td style="border-right: 2px solid #dee2e6; text-align: center;">
                                                        <input type="number" name="persentase[]" class="form-control hitung" value="{{ $kn->persentase }}" required>
                                                    </td>
                                                    <td style="border-right: 2px solid #dee2e6; text-align: center;">
                                                        <a href="{{ route('backend.koordinator-pa.komponen-nilai.proposal.delete', ['id' => $kn->id]) }}" class="btn btn-primary shadow bg-primary" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')"> <i class="fa fa-trash"></i> Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3">
                                                    <center>
                                                        <b>Total Nilai : {{ $total_komponen_proposal }}</b>
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
                                    <form action="{{ route('backend.koordinator-pa.komponen-nilai.proposal.update-deadline') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Periode <span style="color: red">*</span></label>
                                            <div class="col-sm-10">
                                                <select name="periode_id" class="form-control">
                                                    @foreach ($periodes as $periode)
                                                        <option value="{{ $periode->id }}" @if($periode_id == $periode->id) selected @endif>{{ $periode->tahun_ajaran }} - {{ $periode->semester }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label font-weight-bold">Tanggal Deadline <span style="color: red">*</span></label>
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
        $('select').on('change', function() {
            return window.location.href = "{{ url('koordinator-pa/komponen-nilai/proposal/edit') }}/"+this.value
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