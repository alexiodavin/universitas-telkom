<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiProposalFinalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_proposal_final', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('proposal_id')->unsigned()->nullable();
            $table->date('tanggal')->nullable();
            $table->double('nilai_final')->nullable();
            $table->string('nilai_mutu')->nullable();
            $table->enum('status', ['Lulus', 'Tidak Lulus']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('proposal_id')->references('id')->on('proposal')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_proposal_final');
    }
}
