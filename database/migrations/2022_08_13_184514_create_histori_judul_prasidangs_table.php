<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriJudulPrasidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histori_judul_prasidang', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('prasidang_id')->unsigned()->nullable();
            $table->string('judul_indo_lama')->nullable();
            $table->string('judul_indo_baru')->nullable();
            $table->string('judul_inggris_lama')->nullable();
            $table->string('judul_inggris_baru')->nullable();
            $table->string('aksi')->nullable();
            $table->foreign('prasidang_id')->references('id')->on('prasidang')->onDelete('cascade');
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
        Schema::dropIfExists('histori_judul_prasidang');
    }
}
