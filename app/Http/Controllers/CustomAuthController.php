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
            'username' => 'required',
            'password' => 'required'
        ]);
		$salt = "pcacc";
        $username = $request->input('username');
        $password = $request->input('password');
        $remember = $request->input('remember');

        $count = User::where('username', $username)->where('password', strtoupper(hash('sha256', $password.$salt)))->count();
        if($count > 0)
        {
            $user = User::where('username', $username)->where('password', strtoupper(hash('sha256', $password.$salt)))->first();
            Auth::loginUsingId($user->id, $remember);
            return Redirect::to('dashboard');
        }
        return Redirect::to('login')->with('fail', 'Usuário ou senha incorreta.');
    }
}
