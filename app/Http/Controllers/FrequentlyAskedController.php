<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;

use App\FrequentlyAsked;

use Gate;
use Redirect;
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
        return view('pages.faq.show', ['questions' => FrequentlyAsked::getQuestions(null), 'recent' => FrequentlyAsked::getQuestions(4)]);
    }

    /**
     * Show the faq manage view.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        if(Gate::allows('admin'))
        {
            return view('pages.faq.manage', ['questions' => FrequentlyAsked::getQuestions(null)]);
        }
        else
        {
            return Redirect::to('faq');
        }
    }

    public function edit($id)
    {
        if(Gate::allows('admin'))
        {
            $data = FrequentlyAsked::findOrFail($id);
            return view('pages.faq.edit', ['faq_data' => $data]);
        }
    }

    public function update(Request $request, $id)
    {
        if(Gate::allows('admin'))
        {
            $this->validate($request, [
                'title' => 'required|max:120',
                'comment' => 'required'
            ]);

            $array = [
                'title' => $request->input('title'),
                'content' => $request->input('comment'),
                'creator_id' => Auth::user()->id
            ];

            FrequentlyAsked::where('id', $id)
                            ->update($array);
            return Redirect::to("faq/$id/edit")->with('success', true);
        }
    }

    public function store(Request $request)
    {
        if(Gate::allows('admin'))
        {
            $this->validate($request, [
                'title' => 'required|max:120',
                'comment' => 'required'
            ]);

            $inputs = [
                'title' => $request->input('title'),
                'content' => $request->input('comment'),
                'creator_id' => Auth::user()->id
            ];

            FrequentlyAsked::Create($inputs);
            return Redirect::to('faq/gerenciar')->with('success', true);
        }
    }

    public function destroy(Request $request, $id)
    {
        if(Gate::allows('admin'))
        {
            $question = FrequentlyAsked::findOrFail($id);
            FrequentlyAsked::Destroy($id);

            return Redirect::to('faq/gerenciar')->with('success', true);
        }
    }

}
