<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPindahDatangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pindah_datangs', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal_melapor');
            $table->unsignedBigInteger('anggota_keluargas_id');
            $table->string('alamat_asal');
            $table->dateTime('tanggal_surat');
            $table->string('nomor_surat');
            $table->string('keterangan');
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
        Schema::dropIfExists('data_pindah_datangs');
    }
}
