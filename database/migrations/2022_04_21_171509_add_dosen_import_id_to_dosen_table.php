<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDosenImportIdToDosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dosen', function (Blueprint $table) {
            $table->BigInteger('dosen_import_id')->unsigned()->after('periode_id')->nullable();
            $table->foreign('dosen_import_id')->references('id')->on('dosen_import')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dosen', function (Blueprint $table) {
            //
        });
    }
}
