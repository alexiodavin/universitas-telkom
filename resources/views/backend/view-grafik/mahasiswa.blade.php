@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Progress Per Mahasiswa</h1>
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
            series: [
                {
                    name: 'Persentase',
                    data: [
                        {
                            x:@json("$jumlah_proposal".'/'."$total_proposal"),
                            y:@json($proposal)
                        },
                        {
                            x:@json("$jumlah_prasidang".'/'."$total_prasidang"),
                            y:@json($prasidang)
                        },
                        {
                            x:@json("$jumlah_sidang".'/'."$total_sidang"),
                            y:@json($sidang)
                        },
                    ]
                },
            ],
            dataLabels: {
                enabled: true,
                textAnchor: 'middle',
                formatter: function(val, opt) {
                    return opt.w.globals.labels[opt.dataPointIndex][1]
                },
                offsetX: 0,
            },
            yaxis: {
                max: 100,
                labels: {
                    formatter: function (value) {
                        return value + "%";
                    },
                },
                
            },
            xaxis: {
                labels: {
                    formatter: function (value) {
                        return value[0];
                    },
                },
                categories: [
                    ['PROPOSAL',@json("$jumlah_proposal".' dari '."$total_proposal Mahasiswa")],
                    ['PRASIDANG',@json("$jumlah_prasidang".' dari '."$total_prasidang Mahasiswa")],
                    ['SIDANG',@json("$jumlah_sidang".' dari '."$total_sidang Mahasiswa")]]
            },
            
            
        }
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endsection