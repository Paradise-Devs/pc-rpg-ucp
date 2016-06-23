<?php

namespace App;

use DB;
use Auth;
use Illuminate\Database\Eloquent\Model;

class FrequentlyAsked extends Model
{

    protected $fillable = ['title', 'content', 'creator_id', 'created_at', 'update_at'];
    protected $table = 'frequently_askeds';

    public static function getQuestions($limit = 5)
    {
        $frequentlyAsked = DB::table('frequently_askeds')
                            ->limit($limit)
                            ->get();
        return $frequentlyAsked;
    }

    //public static function create($request)
    //{
    //    DB::table('frequently_askeds')->insert([
    //        'title' => $request->input('title'),
    //        'content' => $request->input('comment'),
    //        'creator_id' => Auth::user()->id,
    //        'created_at' => time(),
    //        'updated_at' => time()
    //    ]);
    //}

}
