<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/', function () {
    return redirect('login');
});

Route::get('forgot-password', [\App\Http\Controllers\Frontend\DashboardController::class, 'forgotPassword'])->name('frontend.forgot-password');
Route::post('forgot-password/store', [\App\Http\Controllers\Frontend\DashboardController::class, 'storeForgotPassword'])->name('frontend.forgot-password.store');

// BACKEND
Route::get('logout', [\App\Http\Controllers\Backend\DashboardController::class, 'logout'])->name('backend.logout');
Route::group(['middleware' => ['auth:web']], function () {
    Route::get('dashboard', [\App\Http\Controllers\Backend\DashboardController::class, 'dashboard'])->name('backend.dashboard');
    Route::post('/dashboard/update-tahun-ajaran', [\App\Http\Controllers\Backend\DashboardController::class, 'updateTahunAjaran'])->name('backend.dashboard.update-tahun-ajaran');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\DashboardController::class, 'indexProfile'])->name('backend.profile');
        Route::post('store', [\App\Http\Controllers\Backend\DashboardController::class, 'updateProfile'])->name('backend.profile.update');
    });

    Route::group(['middleware' => ['auth.admin']], function () {
        Route::prefix('admin')->group(function () {
            Route::prefix('tahun_ajaran')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\TahunAjaranController::class, 'index'])->name('backend.admin.tahun-ajaran');
                Route::get('create', [\App\Http\Controllers\Backend\TahunAjaranController::class, 'create'])->name('backend.admin.tahun-ajaran.create');
                Route::post('store', [\App\Http\Controllers\Backend\TahunAjaranController::class, 'store'])->name('backend.admin.tahun-ajaran.store');
                Route::get('edit/{id}', [\App\Http\Controllers\Backend\TahunAjaranController::class, 'edit'])->name('backend.admin.tahun-ajaran.edit');
                Route::put('update/{tahun_ajaran}', [\App\Http\Controllers\Backend\TahunAjaranController::class, 'update'])->name('backend.admin.tahun-ajaran.update');
                Route::get('delete/{id}', [\App\Http\Controllers\Backend\CurrentSemesterController::class, 'delete'])->name('backend.admin.tahun-ajaran.delete');
            });
            Route::prefix('current_semester')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\CurrentSemesterController::class, 'index'])->name('backend.admin.current-semester');
                Route::get('create', [\App\Http\Controllers\Backend\CurrentSemesterController::class, 'create'])->name('backend.admin.current-semester.create');
                Route::post('store', [\App\Http\Controllers\Backend\CurrentSemesterController::class, 'store'])->name('backend.admin.current-semester.store');
                Route::get('edit/{id}', [\App\Http\Controllers\Backend\CurrentSemesterController::class, 'edit'])->name('backend.admin.current-semester.edit');
                Route::put('update/{current_semester}', [\App\Http\Controllers\Backend\CurrentSemesterController::class, 'update'])->name('backend.admin.current-semester.update');
                Route::get('delete/{id}', [\App\Http\Controllers\Backend\CurrentSemesterController::class, 'delete'])->name('backend.admin.current-semester.delete');
            });
            Route::prefix('periode')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\PeriodeController::class, 'index'])->name('backend.admin.periode');
                Route::get('create', [\App\Http\Controllers\Backend\PeriodeController::class, 'create'])->name('backend.admin.periode.create');
                Route::post('store', [\App\Http\Controllers\Backend\PeriodeController::class, 'store'])->name('backend.admin.periode.store');
                Route::get('edit/{id}', [\App\Http\Controllers\Backend\PeriodeController::class, 'edit'])->name('backend.admin.periode.edit');
                Route::post('update/{id}', [\App\Http\Controllers\Backend\PeriodeController::class, 'update'])->name('backend.admin.periode.update');
                Route::get('delete/{id}', [\App\Http\Controllers\Backend\PeriodeController::class, 'delete'])->name('backend.admin.periode.delete');
            });
            Route::prefix('periode-semester')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\PeriodeSemesterController::class, 'index'])->name('backend.admin.periode-semester');
                Route::get('create', [\App\Http\Controllers\Backend\PeriodeSemesterController::class, 'create'])->name('backend.admin.periode-semester.create');
                Route::post('store', [\App\Http\Controllers\Backend\PeriodeSemesterController::class, 'store'])->name('backend.admin.periode-semester.store');
                Route::get('edit/{id}', [\App\Http\Controllers\Backend\PeriodeSemesterController::class, 'edit'])->name('backend.admin.periode-semester.edit');
                Route::post('update/{id}', [\App\Http\Controllers\Backend\PeriodeSemesterController::class, 'update'])->name('backend.admin.periode-semester.update');
                Route::get('delete/{id}', [\App\Http\Controllers\Backend\PeriodeSemesterController::class, 'delete'])->name('backend.admin.periode-semester.delete');
            });
            Route::prefix('dosen-koor-pa')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\DosenKoorPAController::class, 'index'])->name('backend.admin.dosen-koor-pa');
                Route::get('create', [\App\Http\Controllers\Backend\DosenKoorPAController::class, 'create'])->name('backend.admin.dosen-koor-pa.create');
                Route::post('store', [\App\Http\Controllers\Backend\DosenKoorPAController::class, 'store'])->name('backend.admin.dosen-koor-pa.store');
                Route::get('edit/{id}', [\App\Http\Controllers\Backend\DosenKoorPAController::class, 'edit'])->name('backend.admin.dosen-koor-pa.edit');
                Route::post('update/{id}', [\App\Http\Controllers\Backend\DosenKoorPAController::class, 'update'])->name('backend.admin.dosen-koor-pa.update');
                Route::get('delete/{id}', [\App\Http\Controllers\Backend\DosenKoorPAController::class, 'delete'])->name('backend.admin.dosen-koor-pa.delete');
            });
            Route::prefix('prodi')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\ProdiController::class, 'index'])->name('backend.admin.prodi');
                Route::get('create', [\App\Http\Controllers\Backend\ProdiController::class, 'create'])->name('backend.admin.prodi.create');
                Route::post('store', [\App\Http\Controllers\Backend\ProdiController::class, 'store'])->name('backend.admin.prodi.store');
                Route::get('edit/{id}', [\App\Http\Controllers\Backend\ProdiController::class, 'edit'])->name('backend.admin.prodi.edit');
                Route::post('update/{id}', [\App\Http\Controllers\Backend\ProdiController::class, 'update'])->name('backend.admin.prodi.update');
                Route::get('delete/{id}', [\App\Http\Controllers\Backend\ProdiController::class, 'delete'])->name('backend.admin.prodi.delete');
            });
            Route::prefix('role-dosen')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\RoleDosenController::class, 'index'])->name('backend.admin.role-dosen');
                Route::get('create', [\App\Http\Controllers\Backend\RoleDosenController::class, 'create'])->name('backend.admin.role-dosen.create');
                Route::post('store', [\App\Http\Controllers\Backend\RoleDosenController::class, 'store'])->name('backend.admin.role-dosen.store');
                Route::get('edit/{id}', [\App\Http\Controllers\Backend\RoleDosenController::class, 'edit'])->name('backend.admin.role-dosen.edit');
                Route::post('update/{id}', [\App\Http\Controllers\Backend\RoleDosenController::class, 'update'])->name('backend.admin.role-dosen.update');
                Route::get('delete/{id}', [\App\Http\Controllers\Backend\RoleDosenController::class, 'delete'])->name('backend.admin.role-dosen.delete');
            });
            Route::prefix('nilai-mutu')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\NilaiMutuController::class, 'index'])->name('backend.admin.nilai-mutu');
                Route::get('create', [\App\Http\Controllers\Backend\NilaiMutuController::class, 'create'])->name('backend.admin.nilai-mutu.create');
                Route::post('store', [\App\Http\Controllers\Backend\NilaiMutuController::class, 'store'])->name('backend.admin.nilai-mutu.store');
                Route::get('edit/{id}', [\App\Http\Controllers\Backend\NilaiMutuController::class, 'edit'])->name('backend.admin.nilai-mutu.edit');
                Route::post('update/{id}', [\App\Http\Controllers\Backend\NilaiMutuController::class, 'update'])->name('backend.admin.nilai-mutu.update');
                Route::get('delete/{id}', [\App\Http\Controllers\Backend\NilaiMutuController::class, 'delete'])->name('backend.admin.nilai-mutu.delete');
            });
            Route::prefix('dosen-kaprodi')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\DosenKaprodiController::class, 'index'])->name('backend.admin.dosen-kaprodi');
                Route::get('create', [\App\Http\Controllers\Backend\DosenKaprodiController::class, 'create'])->name('backend.admin.dosen-kaprodi.create');
                Route::post('store', [\App\Http\Controllers\Backend\DosenKaprodiController::class, 'store'])->name('backend.admin.dosen-kaprodi.store');
                Route::get('edit/{id}', [\App\Http\Controllers\Backend\DosenKaprodiController::class, 'edit'])->name('backend.admin.dosen-kaprodi.edit');
                Route::post('update/{id}', [\App\Http\Controllers\Backend\DosenKaprodiController::class, 'update'])->name('backend.admin.dosen-kaprodi.update');
                Route::get('delete/{id}', [\App\Http\Controllers\Backend\DosenKaprodiController::class, 'delete'])->name('backend.admin.dosen-kaprodi.delete');
            });
            Route::prefix('mahasiswa')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\MahasiswaController::class, 'index'])->name('backend.admin.mahasiswa');
                Route::get('create', [\App\Http\Controllers\Backend\MahasiswaController::class, 'create'])->name('backend.admin.mahasiswa.create');
                Route::post('store', [\App\Http\Controllers\Backend\MahasiswaController::class, 'store'])->name('backend.admin.mahasiswa.store');
                Route::get('edit/{id}', [\App\Http\Controllers\Backend\MahasiswaController::class, 'edit'])->name('backend.admin.mahasiswa.edit');
                Route::post('update/{id}', [\App\Http\Controllers\Backend\MahasiswaController::class, 'update'])->name('backend.admin.mahasiswa.update');
                Route::get('delete/{id}', [\App\Http\Controllers\Backend\MahasiswaController::class, 'delete'])->name('backend.admin.mahasiswa.delete');
                Route::get('detail/{id}', [\App\Http\Controllers\Backend\MahasiswaController::class, 'detail'])->name('backend.admin.mahasiswa.detail');
            });
            Route::prefix('dosen')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\DosenController::class, 'index'])->name('backend.admin.dosen');
                Route::get('create', [\App\Http\Controllers\Backend\DosenController::class, 'create'])->name('backend.admin.dosen.create');
                Route::post('store', [\App\Http\Controllers\Backend\DosenController::class, 'store'])->name('backend.admin.dosen.store');
                Route::get('edit/{id}', [\App\Http\Controllers\Backend\DosenController::class, 'edit'])->name('backend.admin.dosen.edit');
                Route::post('update/{id}', [\App\Http\Controllers\Backend\DosenController::class, 'update'])->name('backend.admin.dosen.update');
                Route::get('delete/{id}', [\App\Http\Controllers\Backend\DosenController::class, 'delete'])->name('backend.admin.dosen.delete');
                Route::get('detail/{prodi_id}', [\App\Http\Controllers\Backend\DosenController::class, 'detail'])->name('backend.admin.dosen.detail');
            });
            Route::prefix('ruangan')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\RuanganController::class, 'index'])->name('backend.admin.ruangan');
                Route::get('create', [\App\Http\Controllers\Backend\RuanganController::class, 'create'])->name('backend.admin.ruangan.create');
                Route::post('store', [\App\Http\Controllers\Backend\RuanganController::class, 'store'])->name('backend.admin.ruangan.store');
                Route::get('edit/{id}', [\App\Http\Controllers\Backend\RuanganController::class, 'edit'])->name('backend.admin.ruangan.edit');
                Route::post('update/{id}', [\App\Http\Controllers\Backend\RuanganController::class, 'update'])->name('backend.admin.ruangan.update');
                Route::get('delete/{id}', [\App\Http\Controllers\Backend\RuanganController::class, 'delete'])->name('backend.admin.ruangan.delete');
            });
            Route::prefix('proposal')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\ProposalController::class, 'index'])->name('backend.admin.proposal');
            });
            Route::prefix('prasidang')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\PrasidangController::class, 'index'])->name('backend.admin.prasidang');
            });
            Route::prefix('sidang')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\SidangController::class, 'index'])->name('backend.admin.sidang');
            });
            Route::prefix('jadwal')->group(function () {
                Route::get('prasidang', [\App\Http\Controllers\Backend\JadwalController::class, 'prasidang'])->name('backend.admin.jadwal.prasidang');
                Route::get('sidang', [\App\Http\Controllers\Backend\JadwalController::class, 'sidang'])->name('backend.admin.jadwal.sidang');
            });
            Route::prefix('nilai')->group(function () {
                Route::get('mahasiswa', [\App\Http\Controllers\Backend\ViewNilaiAdminController::class, 'index'])->name('backend.admin.nilai');
                Route::post('mahasiswa', [\App\Http\Controllers\Backend\ViewNilaiAdminController::class, 'index'])->name('backend.admin.nilai');
            });

            Route::prefix('upload-daftar-mahasiswa')->group(function () {
                Route::prefix('prasidang')->group(function () {
                    Route::get('input-jadwal-prasidang/{id}', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'inputJadwalPrasidangPrasidang'])->name('backend.admin.upload-daftar-mahasiswa.prasidang.input-jadwal-prasidang');
                    Route::post('input-jadwal-prasidang/{id}', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'UpdateInputJadwalPrasidangPrasidang'])->name('backend.admin.upload-daftar-mahasiswa.prasidang.input-jadwal-prasidang.update');
                });

                Route::prefix('sidang')->group(function () {
                    Route::get('input-jadwal-sidang/{id}', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'inputJadwalSidangSidang'])->name('backend.admin.upload-daftar-mahasiswa.sidang.input-jadwal-sidang');
                    Route::post('input-jadwal-sidang/{id}', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'UpdateInputJadwalSidangSidang'])->name('backend.admin.upload-daftar-mahasiswa.sidang.input-jadwal-sidang.update');
                });
            });
        });
    });

    Route::group(['middleware' => ['auth.mahasiswa']], function () {
        Route::prefix('mahasiswa')->group(function () {
            Route::prefix('nilai-proposal')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\NilaiProposalController::class, 'index'])->name('backend.mahasiswa.nilai-proposal');
                Route::get('penguji1', [\App\Http\Controllers\Backend\NilaiProposalController::class, 'penguji1'])->name('backend.mahasiswa.nilai-proposal.penguji1');
                Route::get('penguji2', [\App\Http\Controllers\Backend\NilaiProposalController::class, 'penguji2'])->name('backend.mahasiswa.nilai-proposal.penguji2');
                Route::get('penguji', [\App\Http\Controllers\Backend\NilaiProposalController::class, 'penguji'])->name('backend.mahasiswa.nilai-proposal.penguji');
                Route::get('print', [\App\Http\Controllers\Backend\NilaiProposalController::class, 'print'])->name('backend.mahasiswa.nilai-proposal.print');
            });
            Route::prefix('nilai-prasidang')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\NilaiPrasidangController::class, 'index'])->name('backend.mahasiswa.nilai-prasidang');
                Route::get('penguji', [\App\Http\Controllers\Backend\NilaiPrasidangController::class, 'penguji'])->name('backend.mahasiswa.nilai-prasidang.penguji');
                Route::get('penguji1', [\App\Http\Controllers\Backend\NilaiPrasidangController::class, 'penguji1'])->name('backend.mahasiswa.nilai-prasidang.penguji1');
                Route::get('penguji2', [\App\Http\Controllers\Backend\NilaiPrasidangController::class, 'penguji2'])->name('backend.mahasiswa.nilai-prasidang.penguji2');
                Route::get('print', [\App\Http\Controllers\Backend\NilaiPrasidangController::class, 'print'])->name('backend.mahasiswa.nilai-prasidang.print');
            });
            Route::prefix('nilai-sidang')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\NilaiSidangController::class, 'index'])->name('backend.mahasiswa.nilai-sidang');
                Route::get('penguji', [\App\Http\Controllers\Backend\NilaiSidangController::class, 'penguji'])->name('backend.mahasiswa.nilai-sidang.penguji');
                Route::get('penguji1', [\App\Http\Controllers\Backend\NilaiSidangController::class, 'penguji1'])->name('backend.mahasiswa.nilai-sidang.penguji1');
                Route::get('penguji2', [\App\Http\Controllers\Backend\NilaiSidangController::class, 'penguji2'])->name('backend.mahasiswa.nilai-sidang.penguji2');
            });
            Route::prefix('jadwal-prasidang')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\JadwalPrasidangController::class, 'index'])->name('backend.mahasiswa.jadwal-prasidang');
            });
            Route::prefix('jadwal-sidang')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\JadwalSidangController::class, 'index'])->name('backend.mahasiswa.jadwal-sidang');
            });
            Route::prefix('ta')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\TAController::class, 'index'])->name('backend.mahasiswa.ta');
                Route::post('update', [\App\Http\Controllers\Backend\TAController::class, 'update'])->name('backend.mahasiswa.ta.update');
            });
            Route::prefix('histori-ta')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\TAController::class, 'histori'])->name('backend.mahasiswa.histori-ta');
            });
        });
    });

    Route::group(['middleware' => ['auth.dosen']], function () {
        Route::prefix('dosen')->group(function () {
            Route::prefix('daftar-mahasiswa')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\DaftarMahasiswaController::class, 'index'])->name('backend.dosen.daftar-mahasiswa');
                Route::get('bimbingan', [\App\Http\Controllers\Backend\DaftarMahasiswaController::class, 'bimbingan'])->name('backend.dosen.daftar-mahasiswa.bimbingan');
                Route::get('sidang', [\App\Http\Controllers\Backend\DaftarMahasiswaController::class, 'sidang'])->name('backend.dosen.daftar-mahasiswa.sidang');
            });

            Route::prefix('nilai-mahasiswa')->group(function () {
                Route::prefix('proposal')->group(function () {
                    Route::get('/', [\App\Http\Controllers\Backend\NilaiMahasiswaController::class, 'proposal'])->name('backend.dosen.nilai-mahasiswa.proposal');
                    Route::get('/{id}/editDetail', [\App\Http\Controllers\Backend\NilaiMahasiswaController::class, 'editDetailNilaiProposal'])->name('backend.dosen.nilai-mahasiswa.proposal.edit-detail');
                    Route::get('/{id}/edit', [\App\Http\Controllers\Backend\NilaiMahasiswaController::class, 'editProposal'])->name('backend.dosen.nilai-mahasiswa.proposal.edit');

                    Route::post('/{id}/update-detail-nilai', [\App\Http\Controllers\Backend\NilaiMahasiswaController::class, 'updateDetailNilaiProposal'])->name('backend.dosen.nilai-mahasiswa.proposal.update-detail-nilai');

                    Route::post('/{id}/update-nilai', [\App\Http\Controllers\Backend\NilaiMahasiswaController::class, 'updateNilaiProposal'])->name('backend.dosen.nilai-mahasiswa.proposal.update-nilai');

                    Route::post('/{id}/update', [\App\Http\Controllers\Backend\NilaiMahasiswaController::class, 'updateProposal'])->name('backend.dosen.nilai-mahasiswa.proposal.update');
                    Route::get('/{id}/set-nilai-akhir', [\App\Http\Controllers\Backend\NilaiMahasiswaController::class, 'setNilaiAkhirProposal'])->name('backend.dosen.nilai-mahasiswa.proposal.set-nilai-akhir');
                });

                Route::prefix('prasidang')->group(function () {
                    Route::get('/', [\App\Http\Controllers\Backend\NilaiMahasiswaController::class, 'prasidang'])->name('backend.dosen.nilai-mahasiswa.prasidang');
                    Route::get('/{id}/edit', [\App\Http\Controllers\Backend\NilaiMahasiswaController::class, 'editPrasidang'])->name('backend.dosen.nilai-mahasiswa.prasidang.edit');
                    Route::post('/{id}/update-nilai', [\App\Http\Controllers\Backend\NilaiMahasiswaController::class, 'updateNilaiPrasidang'])->name('backend.dosen.nilai-mahasiswa.prasidang.update-nilai');
                    Route::post('/{id}/update', [\App\Http\Controllers\Backend\NilaiMahasiswaController::class, 'updatePrasidang'])->name('backend.dosen.nilai-mahasiswa.prasidang.update');
                    Route::get('/{id}/set-nilai-akhir', [\App\Http\Controllers\Backend\NilaiMahasiswaController::class, 'setNilaiAkhirPrasidang'])->name('backend.dosen.nilai-mahasiswa.prasidang.set-nilai-akhir');
                });
            });
        });

        Route::prefix('koordinator-pa')->group(function () {
            Route::prefix('komponen-nilai')->group(function () {
                Route::prefix('proposal')->group(function () {
                    Route::get('list/{periode_id}', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'proposal'])->name('backend.koordinator-pa.komponen-nilai.proposal');
                    Route::get('list', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'proposal'])->name('backend.koordinator-pa.komponen-nilai.proposal');
                    Route::post('update-deadline', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'updateDeadlineProposal'])->name('backend.koordinator-pa.komponen-nilai.proposal.update-deadline');
                    Route::post('store', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'storeProposal'])->name('backend.koordinator-pa.komponen-nilai.proposal.store');
                    Route::get('edit/{periode_id}', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'editProposal'])->name('backend.koordinator-pa.komponen-nilai.proposal.edit');
                    Route::get('edit', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'editProposal'])->name('backend.koordinator-pa.komponen-nilai.proposal.edit');
                    Route::post('update', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'updateProposal'])->name('backend.koordinator-pa.komponen-nilai.proposal.update');
                    Route::get('upload', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'uploadProposal'])->name('backend.koordinator-pa.komponen-nilai.proposal.upload');
                    Route::post('upload/store', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'storeUploadProposal'])->name('backend.koordinator-pa.komponen-nilai.proposal.upload.store');
                    Route::get('delete/{id}', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'deleteProposal'])->name('backend.koordinator-pa.komponen-nilai.proposal.delete');
                });

                Route::prefix('prasidang')->group(function () {
                    Route::get('list/{periode_id}', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'prasidang'])->name('backend.koordinator-pa.komponen-nilai.prasidang');
                    Route::get('list/', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'prasidang'])->name('backend.koordinator-pa.komponen-nilai.prasidang');
                    Route::post('update-deadline', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'updateDeadlinePrasidang'])->name('backend.koordinator-pa.komponen-nilai.prasidang.update-deadline');
                    Route::post('store', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'storePrasidang'])->name('backend.koordinator-pa.komponen-nilai.prasidang.store');
                    Route::get('edit/{periode_id}', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'editPrasidang'])->name('backend.koordinator-pa.komponen-nilai.prasidang.edit');
                    Route::get('edit/', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'editPrasidang'])->name('backend.koordinator-pa.komponen-nilai.prasidang.edit');
                    Route::post('update', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'updatePrasidang'])->name('backend.koordinator-pa.komponen-nilai.prasidang.update');
                    Route::get('upload', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'uploadPrasidang'])->name('backend.koordinator-pa.komponen-nilai.prasidang.upload');
                    Route::post('upload/store', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'storeUploadPrasidang'])->name('backend.koordinator-pa.komponen-nilai.prasidang.upload.store');
                    Route::get('delete/{id}', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'deletePrasidang'])->name('backend.koordinator-pa.komponen-nilai.prasidang.delete');
                });

                Route::prefix('sidang')->group(function () {
                    Route::get('list/{periode_id}', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'sidang'])->name('backend.koordinator-pa.komponen-nilai.sidang');
                    Route::get('list/', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'sidang'])->name('backend.koordinator-pa.komponen-nilai.sidang');
                    Route::post('update-deadline', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'updateDeadlineSidang'])->name('backend.koordinator-pa.komponen-nilai.sidang.update-deadline');
                    Route::post('store', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'storeSidang'])->name('backend.koordinator-pa.komponen-nilai.sidang.store');
                    Route::get('edit/{periode_id}', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'editSidang'])->name('backend.koordinator-pa.komponen-nilai.sidang.edit');
                    Route::get('edit/', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'editSidang'])->name('backend.koordinator-pa.komponen-nilai.sidang.edit');
                    Route::post('update', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'updateSidang'])->name('backend.koordinator-pa.komponen-nilai.sidang.update');
                    Route::get('upload', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'uploadSidang'])->name('backend.koordinator-pa.komponen-nilai.sidang.upload');
                    Route::post('upload/store', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'storeUploadSidang'])->name('backend.koordinator-pa.komponen-nilai.sidang.upload.store');
                    Route::get('delete/{id}', [\App\Http\Controllers\Backend\KomponenNilaiController::class, 'deleteSidang'])->name('backend.koordinator-pa.komponen-nilai.sidang.delete');
                });
            });


            Route::prefix('upload-daftar-mahasiswa')->group(function () {
                Route::prefix('proposal')->group(function () {
                    Route::get('/', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'proposal'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.proposal');
                    Route::get('create', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'createProposal'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.proposal.create');
                    Route::post('create', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'createProposal'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.proposal.create');
                    Route::post('store', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'storeProposal'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.proposal.store');
                    Route::post('upload', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'uploadProposal'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.proposal.upload');
                    Route::get('edit/{id}', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'editProposal'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.proposal.edit');
                    Route::post('update/{id}', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'updateProposal'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.proposal.update');
                    Route::get('delete/{id}', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'deleteProposal'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.proposal.delete');
                });

                Route::prefix('prasidang')->group(function () {
                    Route::get('/', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'prasidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang');
                    Route::post('/', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'prasidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang');
                    Route::get('create', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'createPrasidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang.create');
                    Route::post('store', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'storePrasidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang.store');
                    Route::post('upload', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'uploadPrasidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang.upload');
                    Route::get('edit/{id}', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'editPrasidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang.edit');
                    Route::post('update/{id}', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'updatePrasidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang.update');
                    Route::get('delete/{id}', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'deletePrasidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang.delete');
                    Route::get('input-jadwal-prasidang/{id}', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'inputJadwalPrasidangPrasidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang.input-jadwal-prasidang');
                    Route::post('input-jadwal-prasidang/{id}', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'UpdateInputJadwalPrasidangPrasidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang.input-jadwal-prasidang.update');
                    Route::get('upload-jadwal', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'uploadJadwalPrasidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang.upload-jadwal');
                    Route::post('upload-jadwal', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'storeUploadJadwalPrasidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang.upload-jadwal.store');
                    Route::get('download', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'downloadPrasidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang.download');
                });

                Route::prefix('sidang')->group(function () {
                    Route::get('/', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'sidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.sidang');
                    Route::get('create', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'createSidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.sidang.create');
                    Route::post('create', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'createSidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.sidang.create');
                    Route::post('store', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'storeSidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.sidang.store');
                    Route::post('upload', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'uploadSidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.sidang.upload');
                    Route::get('edit/{id}', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'editSidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.sidang.edit');
                    Route::post('update/{id}', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'updateSidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.sidang.update');
                    Route::get('delete/{id}', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'deleteSidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.sidang.delete');
                    Route::get('input-jadwal-sidang/{id}', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'inputJadwalSidangSidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.sidang.input-jadwal-sidang');
                    Route::post('input-jadwal-sidang/{id}', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'UpdateInputJadwalSidangSidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.sidang.input-jadwal-sidang.update');
                    Route::get('upload-jadwal', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'uploadJadwalSidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.sidang.upload-jadwal');
                    Route::post('upload-jadwal', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'storeUploadJadwalSidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.sidang.upload-jadwal.store');
                    Route::get('download', [\App\Http\Controllers\Backend\UploadDaftarMahasiswaController::class, 'downloadSidang'])->name('backend.koordinator-pa.upload-daftar-mahasiswa.sidang.download');
                });
            });

            Route::prefix('jadwal')->group(function () {
                Route::prefix('prasidang')->group(function () {
                    Route::get('/', [\App\Http\Controllers\Backend\JadwalController::class, 'prasidang'])->name('backend.koordinator-pa.jadwal.prasidang');
                    Route::get('delete/{id}', [\App\Http\Controllers\Backend\JadwalController::class, 'deletePrasidang'])->name('backend.koordinator-pa.jadwal.prasidang.delete');
                });
                Route::prefix('sidang')->group(function () {
                    Route::get('/', [\App\Http\Controllers\Backend\JadwalController::class, 'sidang'])->name('backend.koordinator-pa.jadwal.sidang');
                    Route::get('delete/{id}', [\App\Http\Controllers\Backend\JadwalController::class, 'deleteSidang'])->name('backend.koordinator-pa.jadwal.sidang.delete');
                });
            });

            Route::get('view-jadwal-prasidang', [\App\Http\Controllers\Backend\ViewJadwalPrasidangController::class, 'index'])->name('backend.koordinator-pa.view-jadwal-prasidang');
            Route::get('view-jadwal-prasidang/edit/{id}', [\App\Http\Controllers\Backend\ViewJadwalPrasidangController::class, 'edit'])->name('backend.koordinator-pa.view-jadwal-prasidang.edit');
            Route::post('view-jadwal-prasidang/update/{id}', [\App\Http\Controllers\Backend\ViewJadwalPrasidangController::class, 'update'])->name('backend.koordinator-pa.view-jadwal-prasidang.update');
            Route::get('view-jadwal-prasidang/delete/{id}', [\App\Http\Controllers\Backend\ViewJadwalPrasidangController::class, 'delete'])->name('backend.koordinator-pa.view-jadwal-prasidang.delete');

            Route::get('view-jadwal-sidang', [\App\Http\Controllers\Backend\ViewJadwalSidangController::class, 'index'])->name('backend.koordinator-pa.view-jadwal-sidang');
            Route::get('view-jadwal-sidang/edit/{id}', [\App\Http\Controllers\Backend\ViewJadwalSidangController::class, 'edit'])->name('backend.koordinator-pa.view-jadwal-sidang.edit');
            Route::post('view-jadwal-sidang/update/{id}', [\App\Http\Controllers\Backend\ViewJadwalSidangController::class, 'update'])->name('backend.koordinator-pa.view-jadwal-sidang.update');
            Route::get('view-jadwal-sidang/delete/{id}', [\App\Http\Controllers\Backend\ViewJadwalSidangController::class, 'delete'])->name('backend.koordinator-pa.view-jadwal-sidang.delete');

            Route::get('view-progress-mahasiswa', [\App\Http\Controllers\Backend\ViewProgressMahasiswaController::class, 'index'])->name('backend.koordinator-pa.view-progress-mahasiswa');
            Route::get('view-tidak-lulus-sidang', [\App\Http\Controllers\Backend\ViewTidakLulusSidangController::class, 'index'])->name('backend.koordinator-pa.view-tidak-lulus-sidang');

            Route::prefix('view-nilai-proposal')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\ViewNilaiProposalController::class, 'index'])->name('backend.koordinator-pa.view-nilai-proposal');
                Route::post('/', [\App\Http\Controllers\Backend\ViewNilaiProposalController::class, 'index'])->name('backend.koordinator-pa.view-nilai-proposal');
                Route::get('download', [\App\Http\Controllers\Backend\ViewNilaiProposalController::class, 'download'])->name('backend.koordinator-pa.view-nilai-proposal.download');
            });

            Route::prefix('view-nilai-prasidang')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\ViewNilaiPrasidangController::class, 'index'])->name('backend.koordinator-pa.view-nilai-prasidang');
                Route::post('/', [\App\Http\Controllers\Backend\ViewNilaiPrasidangController::class, 'index'])->name('backend.koordinator-pa.view-nilai-prasidang');
                Route::get('download', [\App\Http\Controllers\Backend\ViewNilaiPrasidangController::class, 'download'])->name('backend.koordinator-pa.view-nilai-prasidang.download');
            });

            Route::prefix('view-nilai-sidang')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\ViewNilaiSidangController::class, 'index'])->name('backend.koordinator-pa.view-nilai-sidang');
                Route::post('/', [\App\Http\Controllers\Backend\ViewNilaiSidangController::class, 'index'])->name('backend.koordinator-pa.view-nilai-sidang');
                Route::get('download', [\App\Http\Controllers\Backend\ViewNilaiSidangController::class, 'download'])->name('backend.koordinator-pa.view-nilai-sidang.download');
            });
        });

        Route::prefix('kaprodi')->group(function () {
            Route::prefix('data-mahasiswa')->group(function () {
                Route::prefix('proposal')->group(function () {
                    Route::get('/', [\App\Http\Controllers\Backend\DataMahasiswaController::class, 'proposal'])->name('backend.kaprodi.data-mahasiswa.proposal');
                });
                Route::prefix('prasidang')->group(function () {
                    Route::get('/', [\App\Http\Controllers\Backend\DataMahasiswaController::class, 'prasidang'])->name('backend.kaprodi.data-mahasiswa.prasidang');
                });
                Route::prefix('sidang')->group(function () {
                    Route::get('/', [\App\Http\Controllers\Backend\DataMahasiswaController::class, 'sidang'])->name('backend.kaprodi.data-mahasiswa.sidang');
                });
                Route::prefix('lulus-sidang')->group(function () {
                    Route::get('/', [\App\Http\Controllers\Backend\DataMahasiswaController::class, 'lulusSidang'])->name('backend.kaprodi.data-mahasiswa.lulus-sidang');
                });
            });
            Route::prefix('view-grafik')->group(function () {
                Route::prefix('mahasiswa')->group(function () {
                    Route::get('/', [\App\Http\Controllers\Backend\ViewGrafikController::class, 'mahasiswa'])->name('backend.kaprodi.view-grafik.mahasiswa');
                });
                Route::prefix('sidang-per-angkatan')->group(function () {
                    Route::get('/', [\App\Http\Controllers\Backend\ViewGrafikController::class, 'sidangPerAngkatan'])->name('backend.kaprodi.view-grafik.sidang-per-angkatan');
                });
                Route::prefix('lulus-tepat-waktu')->group(function () {
                    Route::get('/', [\App\Http\Controllers\Backend\ViewGrafikController::class, 'lulusTepatWaktu'])->name('backend.kaprodi.view-grafik.lulus-tepat-waktu');
                });
            });
        });
    });
});
