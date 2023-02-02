<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomponenProposalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komponen_proposal', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('prodi_id')->unsigned()->nullable();
            $table->BigInteger('periode_id')->unsigned()->nullable();
            $table->BigInteger('deadline_proposal_id')->unsigned()->nullable();
            $table->string('nama_komponen')->nullable();
            $table->double('persentase')->nullable();
            $table->string('keterangan')->nullable();
            $table->date('tanggal_deadline_input_nilai')->nullable();
            $table->string('tahun_ajaran')->nullable();
            $table->string('semester')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('prodi_id')->references('id')->on('prodi')->onDelete('cascade');
            $table->foreign('periode_id')->references('id')->on('periode')->onDelete('cascade');
            $table->foreign('deadline_proposal_id')->references('id')->on('deadline_proposal')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komponen_proposal');
    }
}
