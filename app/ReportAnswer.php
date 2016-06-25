<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportAnswer extends Model
{
    protected $table = 'reports_answers';
    public $timestamps = true;

    /**
     * Get the report that owns the answers.
     */
    public function report()
    {
        return $this->belongsTo('App\Report');
    }
}
