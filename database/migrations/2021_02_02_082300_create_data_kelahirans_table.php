<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKelahiransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_kelahirans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_melapor');
            $table->integer('nama_pelapor_id');
            $table->unsignedBigInteger('anggota_keluarga_id');
            $table->string('nomor_anak');
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
        Schema::dropIfExists('data_kelahirans');
    }
}
