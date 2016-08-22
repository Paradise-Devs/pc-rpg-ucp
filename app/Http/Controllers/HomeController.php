<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use DB;
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
        $players = DB::table('players')->select('username', 'level')->get();
        return view('pages.playerlist', ['players' => $players]);
    }
}
