<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketAnswer extends Model
{
    protected $table = "tickets_answers";
    
    /**
    * Get the ticket that owns the answer.
    */
   public function ticket()
   {
       return $this->belongsTo('App\Ticket');
   }

    /**
    * Get the user that wrote the answer.
    */
   public function user()
   {
       return $this->belongsTo('App\User');
   }
}
