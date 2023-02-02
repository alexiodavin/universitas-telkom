<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalSidangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_sidang', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('sidang_id')->unsigned()->nullable();
            $table->BigInteger('ruangan_id')->unsigned()->nullable();
            $table->date('tanggal_sidang')->nullable();
            $table->integer('bulan')->nullable();
            $table->time('jam_mulai_sidang')->nullable();
            $table->time('jam_selesai_sidang')->nullable();
            $table->string('ruangan')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sidang_id')->references('id')->on('sidang')->onDelete('cascade');
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
        Schema::dropIfExists('jadwal_sidang');
    }
}
