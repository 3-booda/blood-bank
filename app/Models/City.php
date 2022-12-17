<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = ['province_id', 'name'];
    public $timestamps = true;


    // Relations
    public function province()
    {
        return $this->belongsTo('App\Models\Province', 'province_id');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User', 'city_id');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest', 'city_id');
    }

}
