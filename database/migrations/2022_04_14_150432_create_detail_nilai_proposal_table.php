<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailNilaiProposalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_nilai_proposal', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('nilai_proposal_id')->unsigned()->nullable();
            $table->BigInteger('komponen_proposal_id')->unsigned()->nullable();
            $table->double('nilai')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('nilai_proposal_id')->references('id')->on('nilai_proposal')->onDelete('cascade');
            $table->foreign('komponen_proposal_id')->references('id')->on('komponen_proposal')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_nilai_proposal');
    }
}
