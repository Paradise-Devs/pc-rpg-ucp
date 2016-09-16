<?php

namespace App\Http\Controllers\Auth;

use DB;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';
    protected $redirectAfterLogout = '/login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:40',
            'sexo' => 'required|numeric|min:0|max:1',
            'date' => 'required|date_format:d/m/Y|before:' . date('d/m/Y') . '|after:01/01/1916',
            'username' => 'required|max:24|unique:users|regex:/[A-Z][a-z]{1,16}(\.)[A-Z][a-z]{1,16}/',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'terms' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
		    $salt = "pcacc";
        $time = strtotime($data['date']);
        $date = date('Y-m-d', $time);
        $user = User::create([
            'name' => $data['name'],
            'birthdate' => $date,
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => strtoupper(hash('sha256', $data['password'].$salt)),
        ]);

        DB::table('players')->insert(['user_id' => $user->id, 'x' => 1449.01, 'y' => -2287.10, 'z' => 13.54, 'a' => 96.36, 'gender' => $data['sexo']]);
        return $user;
    }
}
