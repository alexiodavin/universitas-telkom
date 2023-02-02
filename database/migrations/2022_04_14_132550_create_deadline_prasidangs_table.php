<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeadlinePrasidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deadline_prasidang', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('prodi_id')->unsigned()->nullable();
            $table->BigInteger('periode_id')->unsigned()->nullable();
            $table->date('deadline')->nullable();

            $table->foreign('prodi_id')->references('id')->on('prodi')->onDelete('cascade');
            $table->foreign('periode_id')->references('id')->on('periode')->onDelete('cascade');
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
        Schema::dropIfExists('deadline_prasidangs');
    }
}
