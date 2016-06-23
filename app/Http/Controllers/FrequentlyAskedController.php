<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FrequentlyAsked;
use App\Http\Requests;

class FrequentlyAskedController extends Controller
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
     * Show the faq index view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.faq', ['questions' => FrequentlyAsked::lastQuestions()]);
    }

    /**
     * Show the faq manage view.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        return view('pages.faq_manage');
    }
}
