<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
  protected $fillable = [
    'kepala_keluarga_id',
    'alamat',
    'kode_pos',
    'rt',
    'rw',
    'telepon_rumah',
    'users_id',
  ];
}
