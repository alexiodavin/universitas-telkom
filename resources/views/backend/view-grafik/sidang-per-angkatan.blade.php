@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Progress Sidang Perangkatan</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
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
        var options = {
            chart: {
                type: 'bar',
                height: 600,
            },
            colors: ['#b6252a'],
            series: [{
                name: 'Jumlah',
                data: [@json($sidang_2022), @json($sidang_2021), @json($sidang_2020), @json($sidang_2019)]
            }],
            xaxis: {
                categories: ['2022', '2021', '2020', '2019']
            }
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endsection