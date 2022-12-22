<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'blood_type_id',
        'city_id',
        'last_donation_date',
        'birth_date',
        'phone'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // Relations
    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType', 'blood_type_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function province()
    {
        return $this->city->province();
    }

    public function favorePosts()
    {
        return $this->morphedByMany('App\Models\Post', 'userable');
    }

    public function favoreProvinces()
    {
        return $this->morphedByMany('App\Models\Province', 'userable');
    }

    public function favoreBloodyTypes()
    {
        return $this->morphedByMany('App\Models\BloodType', 'userable');
    }

    public function allfavors()
    {
        return $this->query()->select('*')->from('userables')->where('user_id', $this->id)->get();
    }


    // Mutators
    public function setPasswordAttribute($password)
    {
        if (Hash::needsRehash($password) && !is_null($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }
}
