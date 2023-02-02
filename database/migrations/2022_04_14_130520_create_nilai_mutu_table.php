<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiMutuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_mutu', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('periode_id')->unsigned()->nullable();
            $table->string('index')->nullable();
            $table->double('nilai_min')->nullable();
            $table->double('nilai_maks')->nullable();
            $table->string('tahun_ajaran')->nullable();
            $table->string('semester')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('periode_id')->references('id')->on('periode')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_mutu');
    }
}
