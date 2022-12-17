<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
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
