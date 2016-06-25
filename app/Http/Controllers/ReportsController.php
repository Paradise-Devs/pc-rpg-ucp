<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Report;

use App\Utils;

use Gate;

use Auth;

class ReportsController extends Controller
{

    public function index()
    {
        $reports = Report::where('user_id', Auth::user()->id)->get();
        return view('pages.report', ['reports' => $reports]);
    }

    public function create()
    {
        return view('pages.report_create_player');
    }

    public function create_admin()
    {
        return view('pages.report_create_admin');
    }

    public function manage()
    {
        if(Gate::allows('developer'))
        {
            return view('pages.report_manage');
        }
        else
        {
            return Redirect::to('denuncias');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|min:32',
            'reason' => 'required',
            'accused_name' => 'required|min:4|exists:users,name'
        ]);

        $inputs = [
            'content' => $request->input('content'),
            'reason' => $request->input('reason'),
            'accused_id' => Utils::getUserID($request->input('accused_name')),
            'user_id' => Auth::user()->id
        ];

        Report::Create($inputs);
        return Redirect::to('denuncias')->with('success', true);
    }
}
