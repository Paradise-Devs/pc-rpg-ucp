<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard');
    }

    /**
     * Show the players list.
     *
     * @return \Illuminate\Http\Response
     */
    public function players()
    {
        $players = User::select('username', 'level', 'admin', 'created_at', 'avatar_url')
        ->join('players', 'users.id', '=', 'players.user_id')
        ->get();
        return view('pages.playerlist', ['players' => $players]);
    }
}
