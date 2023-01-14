<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name'];

    public $timestamps = true;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    // Relations
    public function posts()
    {
        return $this->hasMany('App\Models\User', 'category_id');
    }

}
