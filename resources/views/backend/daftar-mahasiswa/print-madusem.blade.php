<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Telkom University - Pengelolaan Data Proyek Akhir Magang Dua Semester</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <section class="content">
        <div class="container mt-3">
            <div class="row p-0 m-0">
                <div class="col-10">
                    <h4>PROGRAM STUDI {{ strtoupper($madusemDetails->mahasiswa->mahasiswa_import->prodi->nama) }}</h4>
                    <h4>FAKULTAS ILMU TERAPAN - UNIVERSITAS TELKOM</h4>
                    <h4>BERITA ACARA & PENILAIAN MAGANG DUA SEMESTER</h4>
                    <span>PROYEK AKHIR SEMESTER {{ strtoupper($madusemDetails->mahasiswa->periode->semester) }} TA {{ strtoupper($madusemDetails->mahasiswa->periode->tahun_ajaran) }}</span><br>
                    <span>PERIODE : {{ strtoupper($madusemDetails->mahasiswa->periode->bulan) . ' ' . strtoupper($madusemDetails->mahasiswa->periode->tahun) }}</span><br>
                </div>
                <div class="col-2">
                    <img src="{{ asset('photo/logo.png') }}" style="width: 100px;">
                </div>
            </div>
            <hr style="border: 2px solid black;">
            <div class="col-12">
                {{-- Pada hari Kamis , tanggal 23 Desember 2021  pukul 15.00 - 17.00 WIB, telah dilaksanakan<br> --}}
                <b>Nilai Magang Dua Semester</b> mahasiswa :
            </div>
            <br>
            <div class="col-12 p-4" style="border: 2px solid black;">
                <table class="tg">
                    <tbody>
                        <tr>
                            <td style="width: 200px;">Nama Mahasiswa</td>
                            <td>: {{ $madusemDetails->mahasiswa->nama }}</td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">NIM</td>
                            <td>: {{ $madusemDetails->mahasiswa->nim }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-6">
                    <span>Nama Pembimbing Akademik :</span>
                    @if ($madusemDetails->pbb_1_id && $madusemDetails->pbb_2_id)
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        1. {{ $madusemDetails->pbb1->nama }} 
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        2. {{ $madusemDetails->pbb2->nama }}
                    @endif
                    <br>
                </div>
                <div class="col-6">
                    <span>Nama Penguji :</span>
                    @if ($madusemDetails->puj_1_id && $madusemDetails->puj_2_id)
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        1. {{ $madusemDetails->puj1->nama }} 
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        2. {{ $madusemDetails->puj2->nama }}
                    @endif
                    <br>
                </div>
            </div>

            <div class="col-12 p-4">
                <table class="table table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th style="text-align: center; border-top: 2px solid #dee2e6;">Bobot Maksimal</th>
                            @foreach ($komponenNilai as $nilai )
                            <th style="text-align: center; border-top: 2px solid #dee2e6;">{{ $nilai->nama_komponen }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalNilai = 0; // Inisialisasi variabel totalNilai
                        @endphp
                        <tr>
                            <td style="text-align: center;">100</td>
                            @foreach ($madusem as $madu)
                            @foreach ($madu->komponenMadusemPivots as $pivot)
                                <td style="text-align: center;">
                                    @php
                                        $nilaiValue = $pivot->nilai_komponen ?? 0;
                                        // Menambahkan nilai ke totalNilai
                                        $totalNilai += $nilaiValue;
                                    @endphp
                                    {{ $nilaiValue }}
                                </td>
                            @endforeach
                        @endforeach
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
                PROGRAM STUDI {{ strtoupper($madusemDetails->mahasiswa->mahasiswa_import->prodi->nama) }} FAKULTAS ILMU TERAPAN,UNIVERSITAS TELKOM<br>
                Jl. Telekomunikasi No. 1, Terusan Buahbatu, Bandung 40257 | Telp. 022- 5224137 , 022-5224138
            </div>

        </div>
    </section>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        window.print();
    </script>
</body>

</html>
