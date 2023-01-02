<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password'
    ];
    public $timestamps = true;


    // Relations
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

}
