<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    protected $appends = ['is_favored_by_user'];
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


    // Accessorss and Mutators
    protected function isFavoredByUser(): Attribute
    {
        return new Attribute(
            get: function () {
                return ($this->favoredByUsers()->where('user_id', auth()->user()?->id))->count();
            },
        );
    }


    // Global Scopes
    protected static function booted()
    {
        static::addGlobalScope('accessor', function (Builder $builder) {
            $model = new Post();
            $asset = '/storage/'.$model->image;

            $builder->select('*', DB::raw("CONCAT('$asset', image) as image_url")
            );
        });
    }
}
