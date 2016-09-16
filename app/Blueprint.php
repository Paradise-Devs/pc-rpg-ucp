<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blueprint extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'importance', 'importance_style', 'importance_icon', 'status', 'status_style', 'status_icon', 'upvotes', 'downvotes', 'views'];

    /**
    * The user that owns the message.
    */
   public function user()
   {
       return $this->belongsTo('App\User');
   }

   /**
   * The actions made on this sugestion.
   */
  public function actions()
  {
      return $this->hasMany('App\BlueprintLog');
  }

  /**
  * The comments
  */
 public function comments()
 {
     return $this->hasMany('App\BlueprintComment');
 }
}
