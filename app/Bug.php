<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'importance', 'status', 'affects', 'views'];

    /**
    * The user that owns the message.
    */
   public function user()
   {
       return $this->belongsTo('App\User');
   }
}
