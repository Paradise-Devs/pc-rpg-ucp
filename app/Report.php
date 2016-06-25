<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    /**
     * Get the answers of the report.
     */
    public function answers()
    {
        return $this->hasMany('App\ReportAnswer');
    }
}
