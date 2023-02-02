<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('dosen')->group(function () {
    Route::get('find', [\App\Http\Controllers\API\DosenController::class, 'find'])->name('api.dosen.find');
});

Route::prefix('prodi')->group(function () {
    Route::get('find', [\App\Http\Controllers\API\ProdiController::class, 'find'])->name('api.prodi.find');
});

Route::prefix('proposal')->group(function () {
    Route::get('find-by-mahasiswa-id', [\App\Http\Controllers\API\ProposalController::class, 'findByMahasiswaId'])->name('api.proposal.find-by-mahasiswa-id');
});

Route::prefix('prasidang')->group(function () {
    Route::get('find-by-mahasiswa-id', [\App\Http\Controllers\API\PrasidangController::class, 'findByMahasiswaId'])->name('api.prasidang.find-by-mahasiswa-id');
});