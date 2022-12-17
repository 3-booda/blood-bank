<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    protected $table = 'blood_types';
    protected $fillable = ['name'];
    public $timestamps = true;


    // Relations
    public function clients()
    {
        return $this->hasMany('App\Models\User', 'blood_type_id');
    }

    public function favoredByUsers()
    {
        return $this->morphToMany('App\Models\User', 'userable');
    }

}
