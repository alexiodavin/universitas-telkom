<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiPrasidangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_prasidang', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('prasidang_id')->unsigned()->nullable();
            $table->BigInteger('ruangan_id')->unsigned()->nullable();
            $table->enum('penguji', [1, 2]);
            $table->dateTime('tanggal_penilaian')->nullable();
            $table->string('ruangan')->nullable();
            $table->double('nilai_akhir')->nullable();
            $table->text('catatan')->nullable();
            $table->longText('file')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('prasidang_id')->references('id')->on('prasidang')->onDelete('cascade');
            $table->foreign('ruangan_id')->references('id')->on('ruangan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_prasidang');
    }
}
