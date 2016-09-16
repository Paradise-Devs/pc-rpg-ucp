<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlueprintComment extends Model
{
    protected $fillable = ['user_id', 'blueprint_id', 'message'];

    /**
    * The user that owns the message.
    */
   public function user()
   {
       return $this->belongsTo('App\User');
   }

    /**
    * The bp that owns the message.
    */
   public function blueprint()
   {
       return $this->belongsTo('App\Blueprint');
   }
}
