<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');

        $count = User::where('email', $email)->where('password', $password)->count();
        if($count > 0)
        {
            $user = User::where('email', $email)->where('password', $password)->first();
            Auth::loginUsingId($user->id, $remember);
        }
        return Redirect::to('home');
    }
}
