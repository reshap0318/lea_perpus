<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
  protected $table = 'pembaca_buku';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $casts = [
    'nim' => 'string',
    'buku_id' => 'integer',
    'status' => 'integer',
  ];

  protected $fillable = [
    'nim',
    'buku_id',
    'status',
  ];

  public function mahasiswa($value='')
  {
      return $this->hasOne(user::class,'nim','nim');
  }

  public function buku($value='')
  {
      return $this->hasOne(buku::class,'nim','nim');
  }
}
