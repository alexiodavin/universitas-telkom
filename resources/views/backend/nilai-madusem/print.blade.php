<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Telkom University - Pengelolaan Data Proyek Akhir Magang Dua Semester</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <section class="content">
        <div class="container mt-3">
            <div class="row p-0 m-0">
                <div class="col-10">
                    <h4>PROGRAM STUDI {{ strtoupper($madusem->mahasiswa->mahasiswa_import->prodi->nama) }}</h4>
                    <h4>FAKULTAS ILMU TERAPAN - UNIVERSITAS TELKOM</h4>
                    <h4>BERITA ACARA & PENILAIAN MAGANG DUA SEMESTER</h4>
                    <span>PROYEK AKHIR SEMESTER {{ strtoupper($madusem->mahasiswa->periode->semester) }} TA
                        {{ strtoupper($madusem->mahasiswa->periode->tahun_ajaran) }}</span><br>
                    <span>PERIODE :
                        {{ strtoupper($madusem->mahasiswa->periode->bulan . ' ' . $madusem->mahasiswa->periode->tahun) }}</span><br>
                </div>
                <div class="col-2">
                    <img src="{{ asset('photo/logo.png') }}" style="width: 100px;">
                </div>
            </div>
            <hr style="border: 2px solid black;">
            <div class="col-12">
                {{-- Pada hari Kamis , tanggal 23 Desember 2021  pukul 15.00 - 17.00 WIB, telah dilaksanakan<br> --}}
                <b>Magang Dua Semester</b> mahasiswa :
            </div>
            <br>
            <div class="col-12 p-4" style="border: 2px solid black;">
                <table class="tg">
                    <tbody>
                        <tr>
                            <td style="width: 200px;">Nama Mahasiswa</td>
                            <td>: {{ $madusem->mahasiswa->nama }}</td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">NIM</td>
                            <td>: {{ $madusem->mahasiswa->nim }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-6">
                    <span>Nama Pembimbing Akademik :</span>
                    @if ($madusem->pbb_1_id && $madusem->pbb_2_id)
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        1. {{ $pbb1name }}
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        2. {{ $pbb2name }}
                    @endif
                    <br>
                </div>
                <div class="col-6">
                    <span>Nama Penguji :</span>
                    @if ($madusem->puj_1_id && $madusem->puj_2_id)
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        1. {{ $puj1Name }}
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        2. {{ $puj2Name }}
                    @endif
                    <br>
                </div>
            </div>
            <div class="col-12 p-4">
                <table class="table table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th style="text-align: center; border-top: 2px solid #dee2e6;">Komponen Penilaian</th>
                            <th style="text-align: center; border-top: 2px solid #dee2e6;">Bobot Maksimal</th>
                            <th style="text-align: center; border-top: 2px solid #dee2e6;">Nilai Penguji 1</th>
                            <th style="text-align: center; border-top: 2px solid #dee2e6;">Nilai Penguji 2</th>
                            <th style="text-align: center; border-top: 2px solid #dee2e6;">Nilai Pembimbing 1</th>
                            <th style="text-align: center; border-top: 2px solid #dee2e6;">Nilai Pembimbing 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalNilai = 0; // Inisialisasi variabel totalNilai
                        @endphp
            
                        {{-- Loop untuk komponen prasidang --}}
                        @foreach ($komponenPrasidang as $komp)
                            <tr>
                                <td style="text-align: center;">{{ $komp->nama_komponen }}</td>
                                <td style="text-align: center;">{{ $komp->persentase }}</td> {{-- Jika tidak ada bobot maksimal, gunakan tanda strip --}}
                                <td style="text-align: center; background-color: #F5F5F5;">{{-- Nilai Penguji 1 --}}</td>
                                <td style="text-align: center; background-color: #F5F5F5;">{{-- Nilai Penguji 2 --}}</td>
                                <td style="text-align: center; background-color: #F5F5F5;">{{-- Nilai Pembimbing 1 --}}</td>
                                <td style="text-align: center; background-color: #F5F5F5;">{{-- Nilai Pembimbing 2 --}}</td>
                            </tr>
                        @endforeach
            
                        {{-- Loop untuk menghitung total nilai --}}
                        @foreach ($komponenPrasidang as $komp)
                            @php
                                $totalNilai += $komp->persentase;
                            @endphp
                        @endforeach
            
                        {{-- Loop untuk komponen total nilai --}}
                     <tr>
                            <td colspan="2" class="text-end">Total Nilai :</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end">Rata-rata Nilai :</td>
                            <td>84.93</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end">NILAI SIDANG (Penguji 40% + Pembimbing 60%) :</td>
                            <td>104.92</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-12 p-4">
                <table class="table table-bordered" style="width: 100%;">
                    <tbody>
            
                        {{-- Loop untuk komponen total nilai --}}
                     <tr>
                            <td colspan="2" class="text-end">Nilai seminar (20%)</td>
                            <td>10</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end">Nilai Sidang (80%)</td>
                            <td>20</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end">Nilai Akhir
                                (Nilai Seminar 20% + Nilai Sidang 80%)</td>
                            <td>20</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end">Nilai Mutu
                                </td>
                            <td>20</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="col-12">
                @php
                    $totalNilai;
                    $grades = [[80, 'A'], [70, 'AB'], [65, 'B'], [60, 'BC'], [50, 'C'], [40, 'D'], [0, 'E']];

                    $totalNilai = max(0, min(100, $totalNilai));

                    $letterGrade = null;
                    foreach ($grades as $grade) {
                        if ($totalNilai >= $grade[0]) {
                            $letterGrade = $grade[1];
                            break;
                        }
                    }

                @endphp
                <b>Nilai Magang : {{ $totalNilai }} ({{ $letterGrade ?? '' }})</b>
            </div>
            <div class="col-12 mt-3">
                PROGRAM STUDI {{ strtoupper($madusem->mahasiswa->mahasiswa_import->prodi->nama) }} FAKULTAS ILMU
                TERAPAN,UNIVERSITAS TELKOM<br>
                Jl. Telekomunikasi No. 1, Terusan Buahbatu, Bandung 40257 | Telp. 022- 5224137 , 022-5224138
            </div>

        </div>
    </section>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
        window.print();
    </script>
</body>

</html>
