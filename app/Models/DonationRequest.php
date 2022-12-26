<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{
    protected $table = 'donation_requests';
    protected $fillable = [
        'city_id',
        'blood_type_id',
        'patient_name',
        'patient_phone',
        'patient_age',
        'bag_nums',
        'hospita_address',
        'notes'
    ];
    public $timestamps = true;


    // Relations
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class, 'blood_type_id');
    }
}
