<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
  protected $table = 'buku';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $casts = [
    'kode_buku' => 'string',
    'mahasiswa_nim' => 'string',
    'judul' => 'string',
    'tanggal' => 'date',
    'pembimbing_id_1' => 'integer',
    'pembimbing_id_2' => 'integer',
    'konsentrasi_bidang' => 'string',
    'obj_tmptKp' => 'string',
    'foto' => 'string',
    'jenis' => 'integer',
  ];

  protected $fillable = [
    'kode_buku',
    'mahasiswa_nim',
    'judul',
    'tanggal',
    'pembimbing_id_1',
    'pembimbing_id_2',
    'konsentrasi_bidang',
    'obj_tmptKp',
    'foto',
    'jenis',
  ];

  public function mahasiswa($value='')
  {
      return $this->hasOne(user::class,'nim','mahasiswa_nim');
  }
}
