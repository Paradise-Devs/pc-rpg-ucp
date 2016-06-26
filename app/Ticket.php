<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
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
