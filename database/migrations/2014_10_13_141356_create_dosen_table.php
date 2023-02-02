<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('user_id')->unsigned()->nullable();
            $table->BigInteger('periode_id')->unsigned()->nullable();
            $table->string('nama')->nullable();
            $table->string('nama_gelar')->nullable();
            $table->string('nip')->unique()->nullable();
            $table->string('kode')->unique()->nullable();
            $table->string('telepon')->nullable();
            $table->text('alamat')->nullable();
            $table->longText('foto')->nullable();
            $table->string('tahun_ajaran')->nullable();
            $table->string('semester')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('dosen');
    }
}
