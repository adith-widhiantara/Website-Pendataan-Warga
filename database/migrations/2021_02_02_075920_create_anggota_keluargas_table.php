<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_keluargas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kartu_keluargas_id');
            $table->string('photo')->nullable();
            $table->string('nama')->unique();
            $table->unsignedBigInteger('gelars_id');
            $table->string('nomor_ktp')->unique();
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->dateTime('tanggal_bulan_tahun_lahir');
            $table->enum('surat_lahir', ['Ada', 'Tidak Ada']);
            $table->string('nomor_surat_lahir');
            $table->unsignedBigInteger('golongan_darahs_id');
            $table->unsignedBigInteger('agamas_id');
            $table->string('kepercayaan_terhadap_tuhan_yang_maha_esa');
            $table->unsignedBigInteger('status_perkawinans_id');
            $table->enum('buku_nikah', ['Ada', 'Tidak Ada']);
            $table->string('nomor_buku_nikah');
            $table->dateTime('tanggal_perkawinan');
            $table->enum('surat_cerai', ['Ada', 'Tidak Ada']);
            $table->string('nomor_surat_cerai');
            $table->dateTime('tanggal_perceraian');
            $table->unsignedBigInteger('status_hubungan_dengan_kepala_keluargas_id');
            $table->enum('kelainan_fisik', ['Ada', 'Tidak Ada']);
            $table->unsignedBigInteger('penyandang_cacats_id');
            $table->unsignedBigInteger('pendidikan_terakhirs_id');
            $table->unsignedBigInteger('pekerjaans_id');
            $table->string('nik_ibu');
            $table->string('nama_ibu');
            $table->string('nik_ayah');
            $table->string('nama_ayah');
            $table->unsignedBigInteger('users_id');
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
        Schema::dropIfExists('anggota_keluargas');
    }
}
