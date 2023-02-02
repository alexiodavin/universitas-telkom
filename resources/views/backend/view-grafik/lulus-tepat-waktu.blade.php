@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">View Lulus Sidang</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-header row">
                                <span class="mt-2">Dari Tanggal &nbsp;</span> <input type="date" id="from" class="form-control mr-3" style="width: 175px;" value="{{ request()->from }}">
                                <span class="mt-2">Sampai Tanggal &nbsp;</span> <input type="date" id="to" class="form-control mr-3" style="width: 175px;" value="{{ request()->to }}">
                                <span class="mt-2">Periode &nbsp;</span><select style="width: 175px;" class="form-control float-right">
                                    <option value="">Semua</option>
                                    @foreach ($periodes as $periode)
                                        <option value="{{ $periode->id }}" @if($periode->id == request()->periode_id) selected @endif>{{ $periode->tahun_ajaran }} / {{ $periode->semester }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-body">
                                <div id="chart"></div>
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
        var periode_id = "{{ request()->periode_id }}"
        var to = "{{ request()->to }}"
        var from = "{{ request()->from }}"


        $('select').on('change', function() {
            return window.location.href = "{{ url('kaprodi/view-grafik/lulus-tepat-waktu') }}/?periode_id="+this.value+'&from='+from+'&to='+to
        });

        $('#from').on('change', function() {
            return window.location.href = "{{ url('kaprodi/view-grafik/lulus-tepat-waktu') }}/?periode_id="+periode_id+'&from='+this.value+'&to='+to
        });

        $('#to').on('change', function() {
            return window.location.href = "{{ url('kaprodi/view-grafik/lulus-tepat-waktu') }}/?periode_id="+periode_id+'&from='+from+'&to='+this.value
        });

        var options = {
            chart: {
                type: 'bar',
                height: 600,
            },
            colors: ['#b6252a', '#1D2678'],
            series: [{
                name: 'Jumlah',
                data: [@json($tepat_waktu), @json($tidak_tepat_waktu)]
            }],
            xaxis: {
                categories: ['Sesuai Periode', 'Tidak Sesuai Periode']
            }
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endsection