<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;

use App\FrequentlyAsked;

use Gate;
use Auth;
use Validator;

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
        return view('pages.faq', ['questions' => FrequentlyAsked::getQuestions()]);
    }

    /**
     * Show the faq manage view.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        if(Gate::allows('developer'))
        {
            return view('pages.faq_manage', ['questions' => FrequentlyAsked::getQuestions(null)]);
        }
        else
        {
            return redirect('faq');
        }
    }

    public function store(Request $request)
    {
        if(Gate::allows('developer'))
        {
            $this->validate($request, [
                'title' => 'required|max:120',
                'comment' => 'required'
            ]);

            $inputs = [
                'title' => $request->input('title'),
                'content' => $request->input('comment'),
                'creator_id' => Auth::user()->id,
                'created_at' => time(),
                'updated_at' => time()
            ];

            FrequentlyAsked::Create($inputs);

            return redirect('faq/manage')->with('message', 'success');
        }
    }

}
