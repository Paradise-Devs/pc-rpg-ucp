<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class FrequentlyAsked extends Model
{

    public static function lastQuestions($limit = 5)
    {
        $frequentlyAsked = DB::table('frequently_askeds')
                            ->groupBy('id')
                            ->having('id', '<=', $limit)
                            ->get();
        return $frequentlyAsked;
    }

}
