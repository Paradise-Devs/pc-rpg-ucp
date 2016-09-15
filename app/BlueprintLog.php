<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlueprintLog extends Model
{
    protected $fillable = ['blueprint_id', 'user_id', 'type', 'status', 'icon', 'style'];

    /**
    * The report that owns the action.
    */
   public function blueprint()
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
