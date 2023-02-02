<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaImportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa_import', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('periode_id')->unsigned()->nullable();
            $table->BigInteger('prodi_id')->unsigned()->nullable();
            $table->string('tahun_ajaran')->nullable();
            $table->string('semester')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('periode_id')->references('id')->on('periode')->onDelete('cascade');
            $table->foreign('prodi_id')->references('id')->on('prodi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa_import');
    }
}
