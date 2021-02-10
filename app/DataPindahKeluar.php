<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPindahKeluar extends Model
{
  protected $fillable = [
    'tanggal_melapor',
    'anggota_keluarga_id',
    'tanggal_surat',
    'nomor_surat',
    'alamat_tujuan',
    'keterangan',
  ];

  public function anggotaKeluarga()
  {
    return $this->belongsTo('App\AnggotaKeluarga');
  }
}
