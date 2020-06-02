<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRole()
    {
        return Role::find($this->role_id)->name;
    }

    public function posts()
    {
        return $this->hasMany('App\Post','user_id');
    }


    public function comments()
    {
        return $this->hasMany('App\Comment','user_id');
    }

    public function delete()
    {
        $comments = $this->comments();
        if ($comments != null)
        {
            $comments->delete();
        }


        $posts = $this->posts;
        if ($posts != null)
        {
            foreach ($posts as $post)
            {
                $post->delete();
            }
        }




        return parent ::delete();
    }


}
