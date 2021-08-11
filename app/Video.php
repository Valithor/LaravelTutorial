<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title',
        'url',
        'description'
    ];

    //autor film relacja
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }
    //lista kategorii dla vid
    public function getCategoryListAttribute()
    {
        return $this->categories->pluck('id')->all();
    }
}
