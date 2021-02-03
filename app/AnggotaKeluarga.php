<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model
{
  protected $fillable = [
    'kartu_keluargas_id',
    'photo',
    'nama',
    'gelar_id',
    'nomor_ktp',
    'jenis_kelamin',
    'tempat_lahir',
    'tanggal_bulan_tahun_lahir',
    'surat_lahir',
    'nomor_surat_lahir',
    'golongan_darah_id',
    'agama_id',
    'kepercayaan_terhadap_tuhan_yang_maha_esa',
    'status_perkawinan_id',
    'buku_nikah',
    'nomor_buku_nikah',
    'tanggal_perkawinan',
    'surat_cerai',
    'nomor_surat_cerai',
    'tanggal_perceraian',
    'status_hubungan_dengan_kepala_keluarga_id',
    'kelainan_fisik',
    'penyandang_cacat_id',
    'pendidikan_terakhir_id',
    'pekerjaan_id',
    'nik_ibu',
    'nama_ibu',
    'nik_ayah',
    'nama_ayah',
  ];
}
