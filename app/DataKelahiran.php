<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKelahiran extends Model
{
  protected $fillable = [
    'tanggal_melapor',
    'nama_pelapor_id',
    'anggota_keluarga_id',
    'nomor_anak',
    'keterangan',
  ];

  public function anggotaKeluarga()
  {
    return $this->belongsTo('App\AnggotaKeluarga');
  }
}
