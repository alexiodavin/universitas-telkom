<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailNilaiSidangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_nilai_sidang', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('nilai_sidang_id')->unsigned()->nullable();
            $table->BigInteger('komponen_sidang_id')->unsigned()->nullable();
            $table->double('nilai')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('nilai_sidang_id')->references('id')->on('nilai_sidang')->onDelete('cascade');
            $table->foreign('komponen_sidang_id')->references('id')->on('komponen_sidang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_nilai_sidang');
    }
}
