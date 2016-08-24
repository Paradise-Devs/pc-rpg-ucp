<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'admin', 'bio', 'twitter_url', 'facebook_url', 'github_url', 'avatar_url'
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
     * Get all of the reports for the user.
     */
    public function reports()
    {
        return $this->hasMany('App\Report');
    }

    /**
     * Get all of the messages of the user.
     */
    public function messages()
    {
        return $this->hasMany('App\Message');
    }
}
