@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">{{ $mahasiswa->nama }}
                </h1>
                <h3 class="m-0 text-dark">NIM : {{ $mahasiswa->nim }}
                </h3>
            </div>
        </div>

        <section class="content ml-4 mr-4 mb-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <form method="post" action="{{ isset($madusem) ? route('backend.input-nilai.update', $madusem->id) : route('backend.input-nilai.store') }}">
                                    @csrf
                                
                                    @if(isset($madusem) && $madusem)
                                        @method('PUT')
                                    @endif
                                        <div class="col-6 mb-2">
                                        <a href="{{ route('backend.koordinator-pa.nilai-madusem.print', ['mahasiswa_id' => $mahasiswa->id]) }}" class="btn btn-primary print">Print Penilaian Sidang</a>
                                        </div>

                                        <input type="hidden" name="mahasiswa_id" value="{{ $mahasiswa->id }}">
                                        <table class="table table-hover border" style="width: 100%; border: 0;">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center; width: 100px;">No KN</th>
                                                    <th style="text-align: center; border-left: 2px solid #dee2e6; width: 600px;">Nama</th>
                                                    <th style="text-align: center; border-left: 2px solid #dee2e6; width: 150px;">Nilai Maksimal</th>
                                                    <th style="text-align: center; border-left: 2px solid #dee2e6; width: 150px;">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody id="komponen_sidang">
                                                @php
                                                    $no = 1;
                                                @endphp
                                                <!-- Tampilkan komponen-komponen -->
                                                @foreach($komponenNilai as $komponen)
                                                <tr>
                                                    <td style="border-right: 2px solid #dee2e6;">{{ $no++ }}</td>
                                                    <td style="border-right: 2px solid #dee2e6;">{{ $komponen->nama_komponen }}</td>
                                                    <td style="border-right: 2px solid #dee2e6; text-align: center;">{{ $komponen->presentase }}</td>
                                                    <td style="border-right: 2px solid #dee2e6; text-align: center;">
                                                        @if(isset($madusem))
                                                        <input type="text" name="nilai_komponen[{{ $komponen->id }}]" class="form-control" required value="{{ $madusem->komponenMadusemPivots->where('komponen_madusem_id', $komponen->id)->first()->nilai_komponen ?? '' }}">
                                                        @else
                                                        <input type="text" name="nilai_komponen[{{ $komponen->id }}]" class="form-control" required value="">
                                                        @endif
                                                        {{-- <input type="text" name="nilai_komponen[{{ $komponen->id }}]" class="form-control" required
                                                            value="{{ isset($madusem) ? $madusem->komponenMadusemPivots->where('komponen_madusem_id', $komponen->id)->first()->nilai_komponen : '' }}"> --}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                                <!-- Akhir tampilan komponen-komponen -->
                                        
                                                <tr>
                                                    <td colspan="4">
                                                        <center>
                                                            <span class="font-weight-bolder" id="total"><b>Total Nilai : {{ $total }}</b></span>
                                                            @if ($total < 100)
                                                            <b style="color: #d9534f"> dari {{ $total_komponen_madusem }}</b>
                                                            @endif
                                                        </center>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="pbb_1_id">Pembimbing 1</label>
                                                <select name="pbb_1_id" class="form-control" required >
                                                    <option value="">Select Pembimbing 1</option>
                                                    @foreach ($pembimbing as $dosen)
                                                    <option value="{{ $dosen->id }}" {{ isset($madusem) && $madusem->pbb_1_id == $dosen->id ? 'selected' : '' }}>
                                                        {{ $dosen->nama }}
                                                    </option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="pbb_2_id">Pembimbing 2</label>
                                                <select name="pbb_2_id" class="form-control" required >
                                                    <option value="">Select Pembimbing 2</option>
                                                    @foreach ($pembimbing as $dosen)
                                                    <option value="{{ $dosen->id }}" {{ isset($madusem) && $madusem->pbb_2_id == $dosen->id ? 'selected' : '' }}>
                                                        {{ $dosen->nama }}
                                                    </option>                                                    
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="puj_1_id">Penguji 1</label>
                                                <select name="puj_1_id" class="form-control" required >
                                                    <option value="">Pilih Penguji 1</option>
                                                    @foreach ($pembimbing as $dosen)
                                                    <option value="{{ $dosen->id }}" {{ isset($madusem) && $madusem->puj_1_id == $dosen->id ? 'selected' : '' }}>
                                                        {{ $dosen->nama }}
                                                    </option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="puj_2_id">Penguji 2</label>
                                                <select name="puj_2_id" class="form-control" required >
                                                    <option value="">Pilih Penguji 2</option>
                                                    @foreach ($pembimbing as $dosen)
                                                    <option value="{{ $dosen->id }}" {{ isset($madusem) && $madusem->puj_2_id == $dosen->id ? 'selected' : '' }}>
                                                        {{ $dosen->nama }}
                                                    </option>                                                    
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary{{ isset($madusem) ? ' btn-update' : ' btn-simpan' }}">
                                        {{ isset($madusem) ? 'Update' : 'Simpan' }}
                                    </button>
                                    @if ($madusem)
                                    <button type="button" id="toggleEdit" class="btn btn-primary">{{ isset($madusem) ? 'Edit' : 'Batal' }}</button>
                                    @endif
                                </form>
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
        $(document).ready(function () {
            // Fungsi untuk menghitung dan memperbarui total nilai
            function updateTotal() {
                var total = 0;

                // Iterasi semua input komponen dan tambahkan nilai ke total
                $('input[name^="nilai_komponen"]').each(function () {
                    var nilai = parseFloat($(this).val()) || 0;
                    total += nilai;
                });

                // Memperbarui tampilan total
                $('#total').text('Total Nilai : ' + total);

                // Jika total kurang dari 100, tambahkan pesan peringatan
                if (total < 100) {
                    $('#warning').text('Dari 100');
                } else {
                    $('#warning').text('');
                }
            }

            // Memanggil fungsi updateTotal setiap kali nilai input berubah
            $('input[name^="nilai_komponen"]').on('input', function () {
                updateTotal();
            });

            // Memanggil fungsi updateTotal saat halaman dimuat
            updateTotal();
        });
        $('#periode').on('change', function() {
            window.location.href = "{{ route('backend.admin.mahasiswa') }}" + '?periode=' + this.value
        });
        document.addEventListener('DOMContentLoaded', function () {
        // Dapatkan elemen-elemen form, select, tombol
        var form = document.getElementById('nilaiForm');
        var selectPbb1 = document.getElementsByName('pbb_1_id')[0];
        var selectPbb2 = document.getElementsByName('pbb_2_id')[0];
        var selectPuj1 = document.getElementsByName('puj_1_id')[0];
        var selectPuj2 = document.getElementsByName('puj_2_id')[0];
        var inputNilai = document.querySelectorAll('input[name^="nilai_komponen"]');
        var toggleEditButton = document.getElementById('toggleEdit');

        // Fungsi untuk mengatur disable atau enable elemen-elemen form
        function setFormDisabled(disabled) {
            selectPbb1.disabled = disabled;
            selectPbb2.disabled = disabled;
            selectPuj1.disabled = disabled;
            selectPuj2.disabled = disabled;

            // Iterasi melalui input nilai dan atur disable atau enable
            inputNilai.forEach(function (input) {
                input.disabled = disabled;
            });
        }

        // Panggil fungsi saat halaman dimuat
        setFormDisabled({{ isset($madusem) ? 'true' : 'false' }});

        // Tambahkan event listener untuk mengubah status disable saat tombol di klik
        toggleEditButton.addEventListener('click', function () {
            var isDisabled = selectPbb1.disabled;

            // Panggil fungsi untuk mengubah status disable
            setFormDisabled(!isDisabled);

            // Ganti teks tombol berdasarkan status disable
            toggleEditButton.textContent = isDisabled ? 'Batal' : 'Edit';
        });
    });
    
    </script>
@endsection
