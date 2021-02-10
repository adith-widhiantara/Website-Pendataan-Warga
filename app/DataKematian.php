<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKematian extends Model
{
  protected $fillable = [
    'tanggal_melapor',
    'nama_pelapor_id',
    'anggota_keluarga_id',
    'tanggal_meninggal',
    'tempat_meninggal',
    'sebab_kematian',
    'keterangan',
  ];

  public function anggotaKeluarga()
  {
    return $this->belongsTo('App\AnggotaKeluarga');
  }
}
