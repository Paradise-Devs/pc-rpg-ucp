<?php

namespace App;

use DB;
use Auth;
use Illuminate\Database\Eloquent\Model;

class FrequentlyAsked extends Model
{

    protected $fillable = ['title', 'content', 'creator_id', 'created_at', 'update_at'];
    protected $table = 'frequently_askeds';

    public $timestamps = true;

    public static function getQuestions($limit = 5)
    {
        $frequentlyAsked = DB::table('frequently_askeds')
                            ->limit($limit)
                            ->orderBy('id', 'desc')
                            ->get();
        return $frequentlyAsked;
    }

}
