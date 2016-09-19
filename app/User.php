<?php

namespace App;

use Hootlex\Friendships\Traits\Friendable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'birthdate', 'username', 'email', 'password', 'admin', 'bio', 'twitter_url', 'facebook_url', 'github_url', 'avatar_url'
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

    /**
     * Get all of the user's notifications.
     */
    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

    /**
     * Adds a notification for the user
     */
    public function newNotification()
    {
        $notification = new Notification;
        $notification->user()->associate($this);
        return $notification;
    }
}
