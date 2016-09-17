<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Ticket;
use App\Report;
use App\Http\Requests;
use Illuminate\Http\Request;

class UCPController extends Controller
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
        $user = Auth::user();
        $staff_online = User::select('users.id', 'username')->join('players', 'users.id', '=', 'players.user_id')->where('admin', '>', 1)->where('players.isOnline', 1)->count();
        $players      = User::select('users.id', 'users.id', 'username', 'admin', 'avatar_url')->join('players', 'users.id', '=', 'players.user_id')->where('players.isOnline', 1)->get();
        $ticket_count = Ticket::where('user_id', $user->id)->count();
        $report_count = Report::where('user_id', $user->id)->count();
        return view('pages.dashboard', ['staff_online' => $staff_online, 'players' => $players, 'tickets' => $ticket_count, 'reports' => $report_count]);
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

    /**
     * Show the search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->input('busca');
        $users  = User::select('users.id', 'username', 'level', 'admin', 'created_at', 'avatar_url')
        ->join('players', 'users.id', '=', 'players.user_id')->
        where('name', 'like', '%'.$search.'%')->
        orWhere('username', 'like', '%'.$search.'%')->get();
        return view('pages.search', ['users' => $users]);
    }
}
