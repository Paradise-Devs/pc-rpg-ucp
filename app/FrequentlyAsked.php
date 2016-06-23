<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class FrequentlyAsked extends Model
{

    public static function getQuestions($limit = 5)
    {
        $frequentlyAsked = DB::table('frequently_askeds')
                            ->limit($limit)
                            ->get();
        return $frequentlyAsked;
    }

}
