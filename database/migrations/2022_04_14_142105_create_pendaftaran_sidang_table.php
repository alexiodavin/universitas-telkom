<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranSidangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_sidang', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('periode_id')->unsigned()->nullable();
            $table->BigInteger('mahasiswa_id')->unsigned()->nullable();
            $table->date('tanggal_maksimal_daftar')->nullable();
            $table->string('transkip_nilai')->nullable();
            $table->string('ksm')->nullable();
            $table->string('ktp')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('surat_pernyataan')->nullable();
            $table->enum('status_pendaftaran', ['Belum dikonfirmasi', 'Diterima', 'Ditolak']);
            $table->string('tahun_ajaran')->nullable();
            $table->string('semester')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('periode_id')->references('id')->on('periode')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftaran_sidang');
    }
}
