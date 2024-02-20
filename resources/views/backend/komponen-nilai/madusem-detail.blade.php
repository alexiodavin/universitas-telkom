@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            Data Mahasiswa {{ $item->prodi->nama }}
                            {{-- Periode {{ $item->tahun_ajaran }} --}}
                        </h1>
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
                                <table id="example1" class="table table-hover borderless" style="width: 100%; border: 0;">
                                    <thead>
                                        <form method="POST" action="{{ route('backend.koordinator-pa.komponen-nilai.update-madusem', ['id' => $item->id]) }}">
                                            @csrf
                                            @method('PUT')
                                            <table id="example1" class="table table-hover borderless" style="width: 100%; border: 0;">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">No</th>
                                                        <th style="width: 150px">NIM</th>
                                                        <th>Nama Mahasiswa</th>
                                                        <th style="width: 200px">Input</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($items as $student)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $student->nim }}</td>
                                                            <td>{{ $student->nama }}</td>
                                                            <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input madusem-checkbox" type="checkbox" id="checkbox{{ $student->id }}" name="students[]" value="{{ $student->id }}" {{ $student->madusem ? 'checked' : '' }}>
                                                                    </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <input type="hidden" name="madusem" value="1"> <!-- Default value, you may adjust as needed -->
                                            <button type="submit" class="btn btn-primary mt-3">Update Madusem</button>
                                        </form>
                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
@endpush
