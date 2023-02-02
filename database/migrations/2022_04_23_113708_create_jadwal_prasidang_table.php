<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalPrasidangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_prasidang', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('prasidang_id')->unsigned()->nullable();
            $table->BigInteger('ruangan_id')->unsigned()->nullable();
            $table->date('tanggal_prasidang')->nullable();
            $table->integer('bulan')->nullable();
            $table->time('jam_mulai_prasidang')->nullable();
            $table->time('jam_selesai_prasidang')->nullable();
            $table->string('ruangan')->nullable();
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
        Schema::dropIfExists('jadwal_prasidang');
    }
}
