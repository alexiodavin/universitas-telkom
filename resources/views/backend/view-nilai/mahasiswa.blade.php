@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Nilai Proposal Mahasiswa</h1>
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
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th style="width: 150px;">NIM</th>
                                            <th style="width: 100px">Nama Mahasiswa</th>
                                            <th style="width: 150px;">Judul</th>
                                            <th style="width: 150px;">Title</th>
                                            <th style="width: 75px;">PBB 1</th>
                                            <th style="width: 75px;">PBB 2</th>
                                            <th style="width: 75px;">PUJ 1</th>
                                            <th style="width: 75px;">PUJ 2</th>
                                            <th style="width: 200px;">Periode</th>
                                            <th style="width: 75px;">Jenis</th>
                                            <th style="width: 50px;">Nilai</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach($items as $item)
                                          @if ($item->proposal)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->proposal->mahasiswa->nim }}</td>
                                                <td>{{ $item->proposal->mahasiswa->nama }}</td>
                                                <td>{{ $item->proposal->judul_indo }}</td>
                                                <td>{{ $item->proposal->judul_inggris }}</td>
                                                <td>{{ $item->proposal->pembimbing1->kode }}</td>
                                                <td>{{ $item->proposal->pembimbing2->kode }}</td>
                                                <td>{{ $item->proposal->penguji1->kode }}</td>
                                                <td>{{ $item->proposal->penguji2->kode }}</td>
                                                <td>
                                                  <select name="periode_id" onchange="changePeriodeProposal(this)" class="form-control" >
                                                    @foreach ($periodes as $periode)
                                                        <option value="{{ $periode->id }}" @if($periode->id == $item->proposal->periode_id) selected @endif >{{ $periode->tahun_ajaran }} - {{ $periode->semester }}</option>
                                                    @endforeach
                                                  </select>
                                                  <input type="hidden" value="{{ $item->proposal_id }}">
                                                </td>
                                                <td>{{ $item->jenis }}</td>
                                                <td>{{ $item->nilai_akhir }}</td>
                                            </tr>
                                          @elseif($item->prasidang)
                                            <tr>
                                              <td>{{ $no++ }}</td>
                                              <td>{{ $item->prasidang->mahasiswa->nim }}</td>
                                              <td>{{ $item->prasidang->mahasiswa->nama }}</td>
                                              <td>{{ $item->prasidang->judul_indo }}</td>
                                              <td>{{ $item->prasidang->judul_inggris }}</td>
                                              <td>{{ $item->prasidang->pembimbing1->kode }}</td>
                                              <td>{{ $item->prasidang->pembimbing2->kode }}</td>
                                              <td>{{ $item->prasidang->penguji1->kode }}</td>
                                              <td>{{ $item->prasidang->penguji2->kode }}</td>
                                              <td>
                                                <select name="periode_id" onchange="changePeriodePrasidang(this)" class="form-control" >
                                                  @foreach ($periodes as $periode)
                                                      <option value="{{ $periode->id }}" @if($periode->id == $item->prasidang->periode_id) selected @endif >{{ $periode->tahun_ajaran }} - {{ $periode->semester }}</option>
                                                  @endforeach
                                                </select>
                                                <input type="hidden" value="{{ $item->prasidang_id }}">
                                              </td>
                                              <td>{{ $item->jenis }}</td>
                                              <td>{{ $item->nilai_akhir }}</td>
                                            </tr>
                                          @else
                                          <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->sidang->mahasiswa->nim }}</td>
                                            <td>{{ $item->sidang->mahasiswa->nama }}</td>
                                            <td>{{ $item->sidang->judul_indo }}</td>
                                            <td>{{ $item->sidang->judul_inggris }}</td>
                                            <td>{{ $item->sidang->pembimbing1->kode }}</td>
                                            <td>{{ $item->sidang->pembimbing2->kode }}</td>
                                            <td>{{ $item->sidang->penguji1->kode }}</td>
                                            <td>{{ $item->sidang->penguji2->kode }}</td>
                                            <td>
                                              <select name="periode_id" onchange="changePeriodeSidang(this)" class="form-control" >
                                                @foreach ($periodes as $periode)
                                                    <option value="{{ $periode->id }}" @if($periode->id == $item->sidang->periode_id) selected @endif >{{ $periode->tahun_ajaran }} - {{ $periode->semester }}</option>
                                                @endforeach
                                              </select>
                                              <input type="hidden" value="{{ $item->sidang_id }}">
                                            </td>
                                            <td>{{ $item->jenis }}</td>
                                            <td>{{ $item->nilai_akhir }}</td>
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

    <script>
      const changePeriodeProposal = (e) =>{
        $.ajax({
             url:'/admin/nilai/mahasiswa',
             type:'POST',
             data: {
              '_token' : '{{ csrf_token() }}',
              'periode_id': e.value,
              'proposal_id' : e.nextElementSibling.value
             },
             dataType:'json',
             success:function(response){
                alert(response);
             },error:function(err){

             }
          })
      }
      const changePeriodePrasidang = (e) =>{
        $.ajax({
             url:'/admin/nilai/mahasiswa',
             type:'POST',
             data: {
              '_token' : '{{ csrf_token() }}',
              'periode_id': e.value,
              'prasidang_id' : e.nextElementSibling.value
             },
             dataType:'json',
             success:function(response){
              alert(response);
             },error:function(err){

             }
          })
      }
      const changePeriodeSidang = (e) =>{
        $.ajax({
             url:'/admin/nilai/mahasiswa',
             type:'POST',
             data: {
              '_token' : '{{ csrf_token() }}',
              'periode_id': e.value,
              'sidang_id' : e.nextElementSibling.value
             },
             dataType:'json',
             success:function(response){
              alert(response);
             },error:function(err){

             }
          })
      }
    </script>
@endsection