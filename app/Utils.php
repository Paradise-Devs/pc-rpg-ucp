<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Datetime;

class Utils extends Model
{

    public static function timeElapsedString($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
             'y' => 'ano',
             'm' => 'mês',
             'w' => 'semana',
             'd' => 'dia',
             'h' => 'hora',
             'i' => 'minuto',
             's' => 'segundo',
         );
         foreach ($string as $k => &$v)
         {
             if ($diff->$k)
             {
                 $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
             }
             else
             {
                 unset($string[$k]);
             }
         }

         if (!$full) $string = array_slice($string, 0, 1);
         return $string ? implode(', ', $string) . ' atrás' : 'agora mesmo';
    }

    public static function getName($id)
    {
        $user = User::findOrFail($id);
        return $user->name;
    }

    public static function getUserID($name)
    {
        $user = User::where('name', $name)->first();
        return $user->id;
    }

    public static function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }
}
