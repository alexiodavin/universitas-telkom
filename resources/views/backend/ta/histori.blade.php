@extends('layouts.backend.master')

@section('content')
<?php 
use Illuminate\Support\Carbon;
 ?>
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Histori Judul TA PA</h1>
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
                                Histori Proposal
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tanggal Perubahan</th>
                                            <th scope="col">Judul Indo Lama</th>
                                            <th scope="col">Judul Indo Baru</th>
                                            <th scope="col">Judul Inggris Lama</th>
                                            <th scope="col">Judul Inggris Baru</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($histori_proposal as $histori)
                                            <tr>
                                                <th scope="row">{{ Carbon::parse($histori->created_at)->translatedFormat('d F Y H:i') }}</th>
                                                <td>{{ $histori->judul_indo_lama }}</td>
                                                <td>{{ $histori->judul_indo_baru }}</td>
                                                <td>{{ $histori->judul_inggris_lama }}</td>
                                                <td>{{ $histori->judul_inggris_baru }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-header">
                                Histori Prasidang
                            </div>
                            <div class="card-body"> 
                                <table class="table table-bordered" id="examplew">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tanggal Perubahan</th>
                                            <th scope="col">Judul Indo Lama</th>
                                            <th scope="col">Judul Indo Baru</th>
                                            <th scope="col">Judul Inggris Lama</th>
                                            <th scope="col">Judul Inggris Baru</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($histori_prasidang as $histori)
                                            <tr>
                                                <th scope="row">{{ Carbon::parse($histori->created_at)->translatedFormat('d F Y H:i') }}</th>
                                                <td>{{ $histori->judul_indo_lama }}</td>
                                                <td>{{ $histori->judul_indo_baru }}</td>
                                                <td>{{ $histori->judul_inggris_lama }}</td>
                                                <td>{{ $histori->judul_inggris_baru }}</td>
                                            </tr>
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
@endsection