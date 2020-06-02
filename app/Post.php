<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

    protected $fillable = ['title','text','price','user_id','category_id','country_id','is_active'];

    public function images()
    {
        return $this->hasMany('App\Image','post_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment','post_id');
    }

    public function getadvertiser()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function getcountry()
    {
        return $this->belongsTo('App\Country','country_id');
    }

    public function getCategory()
    {
        return $this->belongsTo('App\Category','category_id');
    }

    public function delete()
    {
        $images = $this->images();
        if ($images != null)
        {
            $images->delete();
        }

        $comments = $this->comments();
        if ($comments != null)
        {
            $comments->delete();
        }

        return parent ::delete();
    }
}
