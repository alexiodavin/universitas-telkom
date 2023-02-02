<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodi', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('periode_id')->unsigned()->nullable();
            $table->BigInteger('koor_id')->unsigned()->nullable();
            $table->BigInteger('kaprodi_id')->unsigned()->nullable();

            $table->string('kode')->unique()->nullable();
            $table->string('singkatan')->nullable();
            $table->string('nama')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('tahun_ajaran')->nullable();
            $table->string('semester')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('periode_id')->references('id')->on('periode')->onDelete('cascade');
            $table->foreign('koor_id')->references('id')->on('dosen')->onDelete('cascade');
            $table->foreign('kaprodi_id')->references('id')->on('dosen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prodi');
    }
}
