<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model
{
  protected $fillable = [
    'kartu_keluarga_id',
    'photo',
    'nama',
    'gelars_id',
    'nomor_ktp',
    'jenis_kelamin',
    'tempat_lahir',
    'tanggal_bulan_tahun_lahir',
    'surat_lahir',
    'nomor_surat_lahir',
    'golongan_darahs_id',
    'agamas_id',
    'kepercayaan_terhadap_tuhan_yang_maha_esa',
    'status_perkawinans_id',
    'buku_nikah',
    'nomor_buku_nikah',
    'tanggal_perkawinan',
    'surat_cerai',
    'nomor_surat_cerai',
    'tanggal_perceraian',
    'status_hubungan_dengan_kepala_keluargas_id',
    'kelainan_fisik',
    'penyandang_cacats_id',
    'pendidikan_terakhirs_id',
    'pekerjaans_id',
    'nik_ibu',
    'nama_ibu',
    'nik_ayah',
    'nama_ayah',
    'users_id',
  ];

  public function kartuKeluarga()
  {
    return $this->belongsTo('App\KartuKeluarga');
  }
}
