<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'importance', 'importance_style', 'importance_icon', 'status', 'status_style', 'status_icon', 'views'];

    /**
    * The user that owns the message.
    */
   public function user()
   {
       return $this->belongsTo('App\User');
   }

    /**
    * The actions made on this report.
    */
   public function actions()
   {
       return $this->hasMany('App\BugLog');
   }

    /**
    * The players the are affected by this bug
    */
   public function affects()
   {
       return $this->hasMany('App\BugAffected');
   }
}
