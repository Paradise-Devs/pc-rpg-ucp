<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportsAnswers extends Model
{
    /**
     * Get the report that owns the answers.
     */
    public function post()
    {
        return $this->belongsTo('App\Reports');
    }
}
