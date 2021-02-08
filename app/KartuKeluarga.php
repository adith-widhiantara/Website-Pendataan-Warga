<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
  protected $fillable = [
    'nomorkk',
    'kepala_keluarga_id',
    'alamat',
    'kode_pos',
    'rt',
    'rw',
    'telepon_rumah',
    'users_id',
  ];

  public function anggotaKeluarga()
  {
    return $this->hasMany('App\AnggotaKeluarga')->orderBy('status_hubungan_dengan_kepala_keluargas_id', 'asc');
  }
}
