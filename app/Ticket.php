<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['user_id', 'title', 'content', 'category', 'status'];

    /**
     * Get the user that wrote the ticket / answer.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the answers for the ticket.
     */
    public function answers()
    {
        return $this->hasMany('App\TicketAnswer');
    }
}
