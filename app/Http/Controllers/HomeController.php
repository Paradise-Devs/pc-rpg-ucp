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
        $players = User::select('users.id', 'username', 'level', 'admin', 'created_at', 'avatar_url')
        ->join('players', 'users.id', '=', 'players.user_id')
        ->get();
        return view('pages.playerlist', ['players' => $players]);
    }

    /**
     * Show the ranking list.
     *
     * @return \Illuminate\Http\Response
     */
    public function ranking()
    {
        // $players = User::select('username', 'level', 'money', 'bank', 'played_time', 'avatar_url')->join('players', 'users.id', '=', 'players.user_id')->get();
        $players_level = User::select('users.id', 'username', 'level', 'avatar_url')->orderBy('level', 'desc')->join('players', 'users.id', '=', 'players.user_id')->take(25)->get();
        $players_ptime = User::select('users.id', 'username', 'played_time', 'avatar_url')->orderBy('played_time', 'desc')->join('players', 'users.id', '=', 'players.user_id')->take(25)->get();
        $players_money = User::selectRaw('users.id, username, (money + bank) as cash, avatar_url')->orderBy('cash', 'desc')->join('players', 'users.id', '=', 'players.user_id')->take(25)->get();
        return view('pages.ranking', ['players_level' => $players_level, 'players_ptime' => $players_ptime, 'players_money' => $players_money]);
    }
}
