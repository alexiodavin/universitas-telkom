<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisi', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('sidang_id')->unsigned()->nullable();
            $table->text('catatan_revisi')->nullable();
            $table->double('nilai_akhir')->nullable();
            $table->dateTime('tanggal_pengumpulan_revisi')->nullable();
            $table->dateTime('tanggal_approve_pembimbing1')->nullable();
            $table->dateTime('tanggal_approve_pembimbing2')->nullable();
            $table->dateTime('tanggal_approve_penguji1')->nullable();
            $table->dateTime('tanggal_approve_penguji2')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sidang_id')->references('id')->on('sidang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revisi');
    }
}
