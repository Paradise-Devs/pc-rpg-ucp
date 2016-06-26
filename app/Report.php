<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable =  ['content', 'reason', 'accused_id', 'user_id', 'type', 'created_at', 'updated_at'];
    public $timestamps = true;

    /**
     * Get the user that wrote the report.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the accused player data.
     */
    public function accused()
    {
        return $this->belongsTo('App\User', 'accused_id');
    }
}
