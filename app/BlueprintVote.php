<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlueprintVote extends Model
{
    protected $fillable = ['user_id', 'blueprint_id'];

    /**
    * The report that owns the action.
    */
   public function blueprint()
   {
       return $this->belongsTo('App\Blueprint');
   }

    /**
    * The user that made the action.
    */
   public function user()
   {
       return $this->belongsTo('App\User');
   }
}
