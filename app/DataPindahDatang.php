<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPindahDatang extends Model
{
  protected $fillable = [
    'tanggal_melapor',
    'anggota_keluargas_id',
    'alamat_asal',
    'tanggal_surat',
    'nomor_surat',
    'keterangan',
  ];
}
