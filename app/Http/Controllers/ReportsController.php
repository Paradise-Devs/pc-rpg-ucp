<?php

/*
 * Reports:
 *          0 - Aberta
 *          1 - Em análise
 *          2 - Deferida
 *          3 - Indeferida
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Report;
use App\Utils;
use App\User;

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
        $admins = User::where('admin', '>', 2)->where('admin', '<', 6)->get();
        return view('pages.report.create_admin', ['admins' => $admins]);
    }

    public function manage()
    {
        if(Gate::allows('developer'))
        {
            $reports = Report::all();
            return view('pages.report.manage', ['reports' => $reports]);
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
            'type' => $request->input('type'),
            'accused_id' => Utils::getUserID($request->input('accused_name')),
            'user_id' => Auth::user()->id
        ];

        Report::Create($inputs);
        return Redirect::to('denuncias')->with('success', true);
    }
}
