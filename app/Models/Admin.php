<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    protected $table = 'admins';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $timestamps = true;


    // Relations
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }


    // Accessorss & Mutators
    protected function password(): Attribute
    {
        return Attribute::make(
            fn ($password) => Hash::needsRehash($password) && !is_null($password)
                ? bcrypt($password)
                : $password
        );
    }
}
