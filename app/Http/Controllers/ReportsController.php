<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Report;
use App\Utils;

use Gate;
use Auth;
use Redirect;

class ReportsController extends Controller
{
    public function index()
    {
        $reports = Report::where('user_id', Auth::user()->id)->get();
        return view('pages.report.show', ['reports' => $reports]);
    }

    public function create()
    {
        return view('pages.report.create_player');
    }

    public function create_admin()
    {
        return view('pages.report.create_admin');
    }

    public function manage()
    {
        if(Gate::allows('developer'))
        {
            return view('pages.report.manage');
        }
        else
        {
            return Redirect::to('denuncias');
        }
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);
        if(Gate::allows('developer', $report))
        {
            if($report->status == 0)
            {
                $field = ['status' => 1];
                Report::where('id', $report->id)->update($field);
            }
            return view('pages.report.details_admin', ['report' => $report]);
        }
        elseif(Gate::allows('creator', $report))
        {
            return view('pages.report.details_player', ['report' => $report]);
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
