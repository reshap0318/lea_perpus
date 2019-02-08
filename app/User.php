<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    public function jabatan($value='')
    {
        return $this->belongsToMany('App\role', 'role_users', 'user_id', 'role_id');
    }
}
