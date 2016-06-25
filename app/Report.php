<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public $timestamps = true;
    
    /**
     * Get the answers of the report.
     */
    public function answers()
    {
        return $this->hasMany('App\ReportAnswer');
    }
}
