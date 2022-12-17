<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{
    protected $table = 'donation_requests';
    protected $fillable = [
        'city_id',
        'patient_name',
        'patient_phone',
        'patient_age',
        'bag_nums',
        'hospita_address',
        'longtitude',
        'latitude',
        'details'
    ];
    public $timestamps = true;


    // Relations
    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }

}
