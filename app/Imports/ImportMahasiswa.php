<?php

namespace App\Imports;

use App\Models\NilaiProposal;
use App\Models\DetailNilaiProposal;
use App\Models\NilaiProposalFinal;
use App\Models\NilaiPrasidang;
use App\Models\DetailNilaiPrasidang;
use App\Models\NilaiPrasidangFinal;
use App\Models\NilaiSidang;
use App\Models\DetailNilaiSidang;
use App\Models\NilaiSidangFinal;
use App\Models\JadwalSidang;
use App\Models\PendaftaranSidang;
use App\Models\JadwalPrasidang;

use App\Models\User;
use App\Models\Sidang;
use App\Models\Proposal;
use App\Models\Prasidang;
use App\Models\Mahasiswa;
use App\Models\MahasiswaImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportMahasiswa implements ToCollection
{
    public function collection(Collection $rows)
    {
        $mahasiswa_import = MahasiswaImport::latest()->first();

        foreach ($rows as $key => $row){
            if($key != 0){
                if($row[0] != null || $row[0] != ""){
                    $user = User::create([
                        'role_id' => IS_MAHASISWA,
                        'prodi_id' => $mahasiswa_import->prodi_id,
                        'username' => $row[0],
                        'email' => $row[1],
                        'password' => bcrypt($row[2]),
                    ]);
        
                    $mahasiswa = Mahasiswa::create([
                        'user_id' => $user->id,
                        'periode_id' => $mahasiswa_import->periode_id,
                        'mahasiswa_import_id' => $mahasiswa_import->id,
                        'nama' => $row[3],
                        'nim' => $row[4],
                        'telepon' => $row[5],
                        'alamat' => $row[6],
                        'foto' => 'user.png',
                        'tahun_ajaran' => $mahasiswa_import->tahun_ajaran,
                        'semester' => $mahasiswa_import->semester,
                    ]);
    
                    //proposal
    
                    // $proposal = Proposal::create([
                    //     'mahasiswa_id' => $mahasiswa->id,
                    //     'pembimbing1_id' => 1,
                    //     'pembimbing2_id' => 2,
                    //     'penguji1_id' => 1,
                    //     'penguji2_id' => 2,
                    //     'judul_indo' => 'Sistem Informasi Informasian',
                    //     'judul_inggris' => 'Information Information System',
                    //     'periode_id' => $mahasiswa_import->periode_id,
                    //     'tahun_ajaran' => $mahasiswa_import->tahun_ajaran,
                    //     'semester' => $mahasiswa_import->semester,
                    //     'jumlah_penguji' => 2,
                    // ]);
    
                    // $nilai_proposal1 = NilaiProposal::create([
                    //     'proposal_id' => $proposal->id,
                    //     'ruangan_id' => 1,
                    //     'penguji' => 1,
                    //     'tanggal_penilaian' => '2022-04-30 09:00:00',
                    //     'ruangan' => 'Ruangan 1',
                    //     'nilai_akhir' => 100,
                    //     'catatan' => 'oke mantap, lanjutkan',
                    //     'file' => 'template_dosen.xlsx',
                    // ]);
                    // $nilai_proposal2 = NilaiProposal::create([
                    //     'proposal_id' => $proposal->id,
                    //     'ruangan_id' => 1,
                    //     'penguji' => 2,
                    //     'tanggal_penilaian' => '2022-04-30 09:00:00',
                    //     'ruangan' => 'Ruangan 1',
                    //     'nilai_akhir' => 100,
                    //     'catatan' => 'oke mantap, lanjutkan',
                    //     'file' => 'template_dosen.xlsx',
                    // ]);
    
                    // $detail_nilai_proposal1 = DetailNilaiProposal::create([
                    //     'nilai_proposal_id' => $nilai_proposal1->id,
                    //     'komponen_proposal_id' => 1,
                    //     'nilai' => 20,
                    // ]);
                    // $detail_nilai_proposal1 = DetailNilaiProposal::create([
                    //     'nilai_proposal_id' => $nilai_proposal1->id,
                    //     'komponen_proposal_id' => 2,
                    //     'nilai' => 20,
                    // ]);
                    // $detail_nilai_proposal1 = DetailNilaiProposal::create([
                    //     'nilai_proposal_id' => $nilai_proposal1->id,
                    //     'komponen_proposal_id' => 3,
                    //     'nilai' => 10,
                    // ]);
                    // $detail_nilai_proposal1 = DetailNilaiProposal::create([
                    //     'nilai_proposal_id' => $nilai_proposal1->id,
                    //     'komponen_proposal_id' => 4,
                    //     'nilai' => 25,
                    // ]);
                    // $detail_nilai_proposal1 = DetailNilaiProposal::create([
                    //     'nilai_proposal_id' => $nilai_proposal1->id,
                    //     'komponen_proposal_id' => 5,
                    //     'nilai' => 25,
                    // ]);
    
                    // $detail_nilai_proposal2 = DetailNilaiProposal::create([
                    //     'nilai_proposal_id' => $nilai_proposal2->id,
                    //     'komponen_proposal_id' => 1,
                    //     'nilai' => 20,
                    // ]);
                    // $detail_nilai_proposal2 = DetailNilaiProposal::create([
                    //     'nilai_proposal_id' => $nilai_proposal2->id,
                    //     'komponen_proposal_id' => 2,
                    //     'nilai' => 20,
                    // ]);
                    // $detail_nilai_proposal2 = DetailNilaiProposal::create([
                    //     'nilai_proposal_id' => $nilai_proposal2->id,
                    //     'komponen_proposal_id' => 3,
                    //     'nilai' => 10,
                    // ]);
                    // $detail_nilai_proposal2 = DetailNilaiProposal::create([
                    //     'nilai_proposal_id' => $nilai_proposal2->id,
                    //     'komponen_proposal_id' => 4,
                    //     'nilai' => 25,
                    // ]);
                    // $detail_nilai_proposal2 = DetailNilaiProposal::create([
                    //     'nilai_proposal_id' => $nilai_proposal2->id,
                    //     'komponen_proposal_id' => 5,
                    //     'nilai' => 25,
                    // ]);
                    
                    // $nilai_proposal_final = NilaiProposalFinal::create([
                    //     'proposal_id' => $proposal->id,
                    //     'tanggal' => date('Y-m-d'),
                    //     'nilai_final' => 100,
                    //     'nilai_mutu' => 'A',
                    //     'status' => 'Lulus',
                    // ]);
    
                    //prasidang
    
                    // $prasidang = Prasidang::create([
                    //     'mahasiswa_id' => $mahasiswa->id,
                    //     'pembimbing1_id' => 1,
                    //     'pembimbing2_id' => 2,
                    //     'penguji1_id' => 1,
                    //     'penguji2_id' => 2,
                    //     'judul_indo' => 'Sistem Informasi Informasian',
                    //     'judul_inggris' => 'Information Information System',
                    //     'periode_id' => $mahasiswa_import->periode_id,
                    //     'tahun_ajaran' => $mahasiswa_import->tahun_ajaran,
                    //     'semester' => $mahasiswa_import->semester,
                    //     'jumlah_penguji' => 2,
                    // ]);
    
                    // $jadwal_prasidang = JadwalPrasidang::create([
                    //     'prasidang_id' => $prasidang->id,
                    //     'ruangan_id' => 1,
                    //     'tanggal_prasidang' => '2022-04-30',
                    //     'jam_mulai_prasidang' => '09:00',
                    //     'jam_selesai_prasidang' => '12:00',
                    //     'ruangan' => 'Ruangan 1',
                    // ]);
    
                    // $nilai_prasidang1 = NilaiPrasidang::create([
                    //     'prasidang_id' => $prasidang->id,
                    //     'ruangan_id' => 1,
                    //     'penguji' => 1,
                    //     'tanggal_penilaian' => '2022-04-30 09:00:00',
                    //     'ruangan' => 'Ruangan 1',
                    //     'nilai_akhir' => 100,
                    //     'catatan' => 'oke mantap, lanjutkan',
                    //     'file' => 'template_dosen.xlsx',
                    // ]);
                    // $nilai_prasidang2 = NilaiPrasidang::create([
                    //     'prasidang_id' => $prasidang->id,
                    //     'ruangan_id' => 1,
                    //     'penguji' => 2,
                    //     'tanggal_penilaian' => '2022-04-30 09:00:00',
                    //     'ruangan' => 'Ruangan 1',
                    //     'nilai_akhir' => 100,
                    //     'catatan' => 'oke mantap, lanjutkan',
                    //     'file' => 'template_dosen.xlsx',
                    // ]);
    
                    // $detail_nilai_prasidang1 = DetailNilaiPrasidang::create([
                    //     'nilai_prasidang_id' => $nilai_prasidang1->id,
                    //     'komponen_prasidang_id' => 1,
                    //     'nilai' => 35,
                    // ]);
                    // $detail_nilai_prasidang1 = DetailNilaiPrasidang::create([
                    //     'nilai_prasidang_id' => $nilai_prasidang1->id,
                    //     'komponen_prasidang_id' => 2,
                    //     'nilai' => 35,
                    // ]);
                    // $detail_nilai_prasidang1 = DetailNilaiPrasidang::create([
                    //     'nilai_prasidang_id' => $nilai_prasidang1->id,
                    //     'komponen_prasidang_id' => 3,
                    //     'nilai' => 20,
                    // ]);
                    // $detail_nilai_prasidang1 = DetailNilaiPrasidang::create([
                    //     'nilai_prasidang_id' => $nilai_prasidang1->id,
                    //     'komponen_prasidang_id' => 4,
                    //     'nilai' => 10,
                    // ]);
    
                    // $detail_nilai_prasidang2 = DetailNilaiPrasidang::create([
                    //     'nilai_prasidang_id' => $nilai_prasidang2->id,
                    //     'komponen_prasidang_id' => 1,
                    //     'nilai' => 35,
                    // ]);
                    // $detail_nilai_prasidang2 = DetailNilaiPrasidang::create([
                    //     'nilai_prasidang_id' => $nilai_prasidang2->id,
                    //     'komponen_prasidang_id' => 2,
                    //     'nilai' => 35,
                    // ]);
                    // $detail_nilai_prasidang2 = DetailNilaiPrasidang::create([
                    //     'nilai_prasidang_id' => $nilai_prasidang2->id,
                    //     'komponen_prasidang_id' => 3,
                    //     'nilai' => 20,
                    // ]);
                    // $detail_nilai_prasidang2 = DetailNilaiPrasidang::create([
                    //     'nilai_prasidang_id' => $nilai_prasidang2->id,
                    //     'komponen_prasidang_id' => 4,
                    //     'nilai' => 10,
                    // ]);
                    
                    // $nilai_prasidang_final = NilaiPrasidangFinal::create([
                    //     'prasidang_id' => $prasidang->id,
                    //     'tanggal' => date('Y-m-d'),
                    //     'nilai_final' => 100,
                    //     'nilai_mutu' => 'A',
                    //     'status' => 'Lulus',
                    // ]);
    
                    //sidang
    
                    // $pendaftaran_sidang = PendaftaranSidang::create([
                    //     'mahasiswa_id' => $mahasiswa->id,
                    //     'periode_id' => $mahasiswa_import->periode_id,
                    //     'tahun_ajaran' => $mahasiswa_import->tahun_ajaran,
                    //     'semester' => $mahasiswa_import->semester,
                    // ]);
    
                    // $sidang = Sidang::create([
                    //     'pendaftaran_sidang_id' => $pendaftaran_sidang->id,
                    //     'mahasiswa_id' => $mahasiswa->id,
                    //     'pembimbing1_id' => 1,
                    //     'pembimbing2_id' => 2,
                    //     'penguji1_id' => 1,
                    //     'penguji2_id' => 2,
                    //     'judul_indo' => 'Sistem Informasi Informasian',
                    //     'judul_inggris' => 'Information Information System',
                    //     'periode_id' => $mahasiswa_import->periode_id,
                    //     'tahun_ajaran' => $mahasiswa_import->tahun_ajaran,
                    //     'semester' => $mahasiswa_import->semester,
                    // ]);
    
                    // $jadwal_sidang = JadwalSidang::create([
                    //     'sidang_id' => $sidang->id,
                    //     'ruangan_id' => null,
                    //     'tanggal_sidang' => '2022-04-30',
                    //     'jam_mulai_sidang' => '09:00',
                    //     'jam_selesai_sidang' => '12:00',
                    //     'ruangan' => 'https://zoom.us',
                    // ]);
    
                    // $nilai_sidang1 = NilaiSidang::create([
                    //     'sidang_id' => $sidang->id,
                    //     'ruangan_id' => null,
                    //     'penguji' => 1,
                    //     'tanggal_penilaian' => '2022-04-30 09:00:00',
                    //     'ruangan' => 'Online',
                    //     'nilai_akhir' => 100,
                    //     'catatan' => 'oke mantap, lanjutkan',
                    // ]);
                    // $nilai_sidang2 = NilaiSidang::create([
                    //     'sidang_id' => $sidang->id,
                    //     'ruangan_id' => null,
                    //     'penguji' => 2,
                    //     'tanggal_penilaian' => '2022-04-30 09:00:00',
                    //     'ruangan' => 'Online',
                    //     'nilai_akhir' => 100,
                    //     'catatan' => 'oke mantap, lanjutkan',
                    // ]);
    
                    // $detail_nilai_sidang1 = DetailNilaiSidang::create([
                    //     'nilai_sidang_id' => $nilai_sidang1->id,
                    //     'komponen_sidang_id' => 1,
                    //     'nilai' => 35,
                    // ]);
                    // $detail_nilai_sidang1 = DetailNilaiSidang::create([
                    //     'nilai_sidang_id' => $nilai_sidang1->id,
                    //     'komponen_sidang_id' => 2,
                    //     'nilai' => 35,
                    // ]);
                    // $detail_nilai_sidang1 = DetailNilaiSidang::create([
                    //     'nilai_sidang_id' => $nilai_sidang1->id,
                    //     'komponen_sidang_id' => 3,
                    //     'nilai' => 20,
                    // ]);
                    // $detail_nilai_sidang1 = DetailNilaiSidang::create([
                    //     'nilai_sidang_id' => $nilai_sidang1->id,
                    //     'komponen_sidang_id' => 4,
                    //     'nilai' => 10,
                    // ]);
    
                    // $detail_nilai_sidang2 = DetailNilaiSidang::create([
                    //     'nilai_sidang_id' => $nilai_sidang2->id,
                    //     'komponen_sidang_id' => 1,
                    //     'nilai' => 35,
                    // ]);
                    // $detail_nilai_sidang2 = DetailNilaiSidang::create([
                    //     'nilai_sidang_id' => $nilai_sidang2->id,
                    //     'komponen_sidang_id' => 2,
                    //     'nilai' => 35,
                    // ]);
                    // $detail_nilai_sidang2 = DetailNilaiSidang::create([
                    //     'nilai_sidang_id' => $nilai_sidang2->id,
                    //     'komponen_sidang_id' => 3,
                    //     'nilai' => 20,
                    // ]);
                    // $detail_nilai_sidang2 = DetailNilaiSidang::create([
                    //     'nilai_sidang_id' => $nilai_sidang2->id,
                    //     'komponen_sidang_id' => 4,
                    //     'nilai' => 10,
                    // ]);
                    
                    // $nilai_sidang_final = NilaiSidangFinal::create([
                    //     'sidang_id' => $sidang->id,
                    //     'tanggal' => date('Y-m-d'),
                    //     'nilai_final' => 100,
                    //     'nilai_mutu' => 'A',
                    //     'status' => 'Lulus',
                    // ]);
                }
            }
        }
    }
}
