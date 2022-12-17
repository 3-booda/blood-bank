<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';
    protected $fillable = ['name'];
    public $timestamps = true;


    // Relations
    public function cities()
    {
        return $this->hasMany('App\Models\City', 'province_id');
    }

    public function favoredByUsers()
    {
        return $this->morphToMany('App\Models\User', 'userable');
    }

}
