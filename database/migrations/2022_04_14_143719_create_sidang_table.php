<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSidangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidang', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('pendaftaran_sidang_id')->nullable()->unsigned();
            $table->BigInteger('mahasiswa_id')->nullable()->unsigned();
            $table->BigInteger('pembimbing1_id')->nullable()->unsigned();
            $table->BigInteger('pembimbing2_id')->nullable()->unsigned();
            $table->BigInteger('penguji1_id')->nullable()->unsigned();
            $table->BigInteger('penguji2_id')->nullable()->unsigned();
            $table->BigInteger('periode_id')->nullable()->unsigned();
            $table->string('judul_indo')->nullable();
            $table->string('judul_inggris')->nullable();
            $table->string('tahun_ajaran')->nullable();
            $table->string('semester')->nullable();
            $table->string('bulan')->nullable();
            $table->integer('jumlah_penguji')->default(2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pendaftaran_sidang_id')->references('id')->on('pendaftaran_sidang')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('pembimbing1_id')->references('id')->on('dosen')->onDelete('cascade');
            $table->foreign('pembimbing2_id')->references('id')->on('dosen')->onDelete('cascade');
            $table->foreign('penguji1_id')->references('id')->on('dosen')->onDelete('cascade');
            $table->foreign('penguji2_id')->references('id')->on('dosen')->onDelete('cascade');
            $table->foreign('periode_id')->references('id')->on('periode')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sidang');
    }
}
