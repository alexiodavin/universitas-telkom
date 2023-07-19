<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Telkom University - Pengelolaan Data Proyek Akhir</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <section class="content">
        <div class="container mt-3">
            <div class="row p-0 m-0">
                <div class="col-10">
                    <h4>PROGRAM STUDI {{ strtoupper(auth()->user()->mahasiswa->mahasiswa_import->prodi->nama) }}</h4>
                    <h4>FAKULTAS ILMU TERAPAN - UNIVERSITAS TELKOM</h4>
                    <h4>BERITA ACARA & PENILAIAN PRASIDANG</h4>
                    <span>PROYEK AKHIR SEMESTER {{ strtoupper(auth()->user()->mahasiswa->periode->semester) }} TA {{ strtoupper(auth()->user()->mahasiswa->periode->tahun_ajaran) }}</span><br>
                    <span>PERIODE : {{ strtoupper(auth()->user()->mahasiswa->periode->bulan . ' ' . auth()->user()->mahasiswa->periode->tahun) }}</span><br>
                </div>
                <div class="col-2">
                    <img src="{{ asset('photo/logo.png') }}" style="width: 100px;">
                </div>
            </div>
            <hr style="border: 2px solid black;">
            <div class="col-12">
                {{-- Pada hari Kamis , tanggal 23 Desember 2021  pukul 15.00 - 17.00 WIB, telah dilaksanakan<br> --}}
                <b>Prasidang Proyek Akhir</b> (PA) mahasiswa :
            </div>
            <br>
            <div class="col-12 p-4" style="border: 2px solid black;">
                <table class="tg">
                    <tbody>
                        <tr>
                            <td style="width: 200px;">Nama Mahasiswa</td>
                            <td>: {{ auth()->user()->mahasiswa->nama }}</td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">NIM</td>
                            <td>: {{ auth()->user()->mahasiswa->nim }}</td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">Judul</td>
                            <td>: {{ $item->judul_indo }}</td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">Judul B.Inggris </td>
                            <td>: {{ $item->judul_inggris }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <br>
                Memutuskan DE mahasiswa ybs :<br>
                <h4>
                    @if ($item->nilai_final)
                        @if ($item->nilai_final->status == 'Lulus')
                            LAYAK DILANJUTKAN
                        @else
                            TIDAK LAYAK DILANJUTKAN
                        @endif
                    @endif
                </h4>
                Penilaian :
                <br>
            </div>
            <div class="col-12 p-4">
                <table style="border: 1px solid black">
                    <tbody>
                        <tr>
                            <td class="pt-1 pb-1" style="text-align: center; width: 300px; border: 1px solid black;"><b>Bobot Maksimal</b></td>
                            <td class="pt-1 pb-1" style="text-align: center; width: 300px; border: 1px solid black;"><b>Nilai Penguji 1</b></td>
                            <td class="pt-1 pb-1" style="text-align: center; width: 300px; border: 1px solid black;"><b>Nilai Penguji 2</b></td>
                        </tr>
                        <tr>
                            <td class="pt-1 pb-1" style="text-align: center; width: 300px; border: 1px solid black;">100</td>
                            <td class="pt-1 pb-1" style="text-align: center; width: 300px; border: 1px solid black;">
                                @if ($item->nilai_penguji1)
                                    {{ $item->nilai_penguji1->nilai_akhir }}
                                @endif
                            </td>
                            <td class="pt-1 pb-1" style="text-align: center; width: 300px; border: 1px solid black;">
                                @if ($item->nilai_penguji2)
                                    {{ $item->nilai_penguji2->nilai_akhir }}
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <h3>Detail Nilai Penguji 1</h3>
            <div class="col-12 p-4">
                <table style="border: 1px solid black">
                    <tbody>
                        <tr>
                            <th style="text-align: center; width: 300px; border: 1px solid black;">Nama Komponen Nilai</th>
                            <th style="text-align: center; width: 300px; border: 1px solid black;">Nilai Maksimal</th>
                            <th style="text-align: center; width: 300px; border: 1px solid black;">Nilai</th>
                        </tr>
                        <tr>
                            @if (isset($item->nilai_penguji1->detail_nilai))
                                @foreach ($item->nilai_penguji1->detail_nilai as $detail_nilai)
                        <tr>
                            <td style="text-align: center; width: 300px; border: 1px solid black;">{{ $detail_nilai->komponen_prasidang->nama_komponen }}</td>
                            <td style="text-align: center; width: 300px; border: 1px solid black;">{{ $detail_nilai->komponen_prasidang->persentase }}</td>
                            <td style="text-align: center; width: 300px; border: 1px solid black;">{{ $detail_nilai->nilai }}</td>
                        </tr>
                        @endforeach
                        @endif
                        </tr>
                    </tbody>
                </table>
            </div>
            <h3>Detail Nilai Penguji 2</h3>
            <div class="col-12 p-4">
                <table style="border: 1px solid black">
                    <tbody>
                        <tr>
                            <th style="text-align: center; width: 300px; border: 1px solid black;">Nama Komponen Nilai</th>
                            <th style="text-align: center; width: 300px; border: 1px solid black;">Nilai Maksimal</th>
                            <th style="text-align: center; width: 300px; border: 1px solid black;">Nilai</th>
                        </tr>
                        <tr>
                            @if (isset($item->nilai_penguji2->detail_nilai))
                                @foreach ($item->nilai_penguji2->detail_nilai as $detail_nilai)
                        <tr>
                            <td style="text-align: center; width: 300px; border: 1px solid black;">{{ $detail_nilai->komponen_prasidang->nama_komponen }}</td>
                            <td style="text-align: center; width: 300px; border: 1px solid black;">{{ $detail_nilai->komponen_prasidang->persentase }}</td>
                            <td style="text-align: center; width: 300px; border: 1px solid black;">{{ $detail_nilai->nilai }}</td>
                        </tr>
                        @endforeach
                        @endif
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                @php
                    $average = '-';
                    $grades = [[80, 'A'], [70, 'AB'], [65, 'B'], [60, 'BC'], [50, 'C'], [40, 'D'], [0, 'E']];
                    if ($item->nilai_penguji1 && $item->nilai_penguji2) {
                        $average = number_format(($item->nilai_penguji1->nilai_akhir + $item->nilai_penguji2->nilai_akhir) / 2, 1);
                        foreach ($grades as $grade) {
                            if ($average >= $grade[0]) {
                                $letterGrade = $grade[1];
                                break;
                            }
                        }
                    }
                @endphp
                <b>Nilai Proposal (Rata-Rata) : {{ $average }} ({{ $letterGrade ?? '' }})</b>
            </div>
            <div class="col-12 mt-3">
                PROGRAM STUDI {{ strtoupper(auth()->user()->mahasiswa->mahasiswa_import->prodi->nama) }} FAKULTAS ILMU TERAPAN,UNIVERSITAS TELKOM<br>
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
