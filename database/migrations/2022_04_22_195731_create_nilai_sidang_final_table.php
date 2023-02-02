<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiSidangFinalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_sidang_final', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('sidang_id')->unsigned()->nullable();
            $table->date('tanggal')->nullable();
            $table->double('nilai_final')->nullable();
            $table->string('nilai_mutu')->nullable();
            $table->enum('status', ['Lulus', 'Tidak Lulus']);
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('nilai_sidang_final');
    }
}
