<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'category_id',
        'admin_id',
        'title',
        'image',
        'content'
    ];
    public $timestamps = true;


    // Relations
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function favoredByUsers()
    {
        return $this->morphToMany('App\Models\User', 'userable');
    }
}
