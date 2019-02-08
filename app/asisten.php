<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asisten extends Model
{
    protected $table = 'asisten';

    public function mahasiswa($value='')
    {
        return $this->hasOne(user::class,'nim','nim');
    }
}
