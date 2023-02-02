<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriJudulProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histori_judul_proposal', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('proposal_id')->unsigned()->nullable();
            $table->string('judul_indo_lama')->nullable();
            $table->string('judul_indo_baru')->nullable();
            $table->string('judul_inggris_lama')->nullable();
            $table->string('judul_inggris_baru')->nullable();
            $table->string('aksi')->nullable();
            $table->foreign('proposal_id')->references('id')->on('proposal')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histori_judul_proposal');
    }
}
