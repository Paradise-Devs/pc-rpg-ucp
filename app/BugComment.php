<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BugComment extends Model
{
    protected $fillable = ['user_id', 'bug_id', 'message'];

    /**
    * The user that owns the message.
    */
   public function user()
   {
       return $this->belongsTo('App\User');
   }

    /**
    * The bug that owns the message.
    */
   public function bug()
   {
       return $this->belongsTo('App\Bug');
   }
}
