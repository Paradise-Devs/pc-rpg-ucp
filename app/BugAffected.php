<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BugAffected extends Model
{
    protected $fillable = ['user_id', 'bug_id'];

    /**
    * The report that owns the action.
    */
   public function bug()
   {
       return $this->belongsTo('App\Bug');
   }

    /**
    * The user that made the action.
    */
   public function user()
   {
       return $this->belongsTo('App\User');
   }
}
