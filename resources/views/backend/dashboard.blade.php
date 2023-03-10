@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <img src="{{ asset('photo/bg-dashboard.png') }}" style="width: 100%;" class="mb-4">
                <div class="card">
                    <div class="card-header">
                        Tahun Ajaran dan Semester yang sedang berjalan
                    </div>
                    <div class="card-body">
                        <form method="post" action="/admin/current_semester/update/{{ $current_semester->id }}">
                            @csrf
                            @method('put')
                            <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <label class="sr-only" for="tahun_ajaran">Tahun Ajaran</label>
                                    <input type="text" class="form-control mb-2" id="tahun_ajaran" name="tahun_ajaran"
                                        value="{{ $current_semester->tahun_ajaran }}">
                                </div>
                                <div class="col-auto">
                                    <label class="sr-only" for="semester">Semester</label>
                                    <div class="input-group mb-2">
                                        <select name="semester" id="semester" class="form-control">\
                                            <option value="" disabled>Pilih Semester</option>
                                            <option value="Ganjil" @if ($current_semester->semester == 'Ganjil') selected @endif>Ganjil
                                            </option>
                                            <option value="Genap" @if ($current_semester->semester == 'Genap') selected @endif>Genap
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
