<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPindahKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pindah_keluars', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_melapor');
            $table->unsignedBigInteger('anggota_keluargas_id');
            $table->date('tanggal_surat');
            $table->string('nomor_surat');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('data_pindah_keluars');
    }
}
