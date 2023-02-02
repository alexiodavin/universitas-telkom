<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailNilaiPrasidangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_nilai_prasidang', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('nilai_prasidang_id')->unsigned()->nullable();
            $table->BigInteger('komponen_prasidang_id')->unsigned()->nullable();
            $table->double('nilai')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('nilai_prasidang_id')->references('id')->on('nilai_prasidang')->onDelete('cascade');
            $table->foreign('komponen_prasidang_id')->references('id')->on('komponen_prasidang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_nilai_prasidang');
    }
}
