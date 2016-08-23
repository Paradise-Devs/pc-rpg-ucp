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
            $reports = Report::orderBy('id', 'desc')->get();
            return view('pages.report.manage', ['reports' => $reports]);
        }
        else
        {
            return Redirect::to('denuncias');
        }
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);
        if(Gate::allows('creator', $report))
        {
            return view('pages.report.details_player', ['report' => $report]);
        }
        else
        {
            return Redirect::to('denuncias');
        }
    }

    public function show_admin($id)
    {
        $report = Report::findOrFail($id);
        if(Gate::allows('developer'))
        {
            if($report->status == 0)
            {
                $field = ['status' => 1];
                Report::where('id', $report->id)->update($field);
            }
            return view('pages.report.details_admin', ['report' => $report]);
        }
        else
        {
            return Redirect::to('denuncias');
        }
    }

    public function destroy(Request $request, $id)
    {
        if(Gate::allows('developer'))
        {
            $report = Report::findOrFail($id);
            Report::Destroy($id);

            return Redirect::to('denuncias/gerenciar')->with('success', true);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|min:32',
            'reason' => 'required',
            'accused_name' => 'required|min:4|exists:users,username'
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

    public function deny(Request $request, $id)
    {
        $this->validate($request, [ 'select_reason' => 'required' ]);

        if($request->input('select_reason') == 'other')
        {
            $this->validate($request, [ 'text_reason' => 'min:4|max:70' ]);

            $inputs = [
                'reject_reason' => $request->input('text_reason'),
                'status' => 3
            ];
        }
        else
        {
            if($request->input('select_reason') == 'no_evidence')
                $inputs = [ 'reject_reason' => 'Evidências insuficientes', 'status' => 3 ];
            else
                $inputs = [ 'reject_reason' => 'Usuário já punido', 'status' => 3 ];
        }

        Report::where('id', $id)->Update($inputs);
        return Redirect::to('denuncias')->with('success', true);
    }
}
