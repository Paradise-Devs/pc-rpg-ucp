<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'creator_id', 'receiver_id', 'subject', 'content', 'category', 'read'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
    * The user that owns the message.
    */
   public function user()
   {
       return $this->belongsTo('App\User');
   }

    /**
    * The user that wrote the message.
    */
   public function creator()
   {
       return $this->belongsTo('App\User', 'creator_id');
   }

    /**
    * The user that received the message.
    */
   public function receiver()
   {
       return $this->belongsTo('App\User', 'receiver_id');
   }
}
