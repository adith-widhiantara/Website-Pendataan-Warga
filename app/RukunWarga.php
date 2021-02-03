<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RukunWarga extends Model
{
  protected $fillable = [
    'nomor',
    'users_id',
  ];
}
