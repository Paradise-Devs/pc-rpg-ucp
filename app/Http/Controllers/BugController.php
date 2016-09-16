<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\BugComment;

use App\BugAffected;

use App\BugLog;

use App\Bug;

use Redirect;

use Auth;

use Gate;

class BugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bugs = Bug::all();
        return view('pages.feedback.bug.index', ['bugs' => $bugs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.feedback.bug.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:4|max:70',
            'description' => 'required|min:4',
            'importance' => 'required'
        ]);

        switch ($request->input('importance'))
        {
            case 'crítico':
                $importance_style = 'danger';
                $importance_icon = 'fire';
                break;

            case 'alta':
                $importance_style = 'warning';
                $importance_icon = 'arrow-up';
                break;

            case 'média':
                $importance_style = 'primary';
                $importance_icon = 'arrow-right';
                break;

            case 'baixa':
                $importance_style = 'success';
                $importance_icon = 'arrow-down';
                break;

            default:
                # code...
                break;
        }

        $inputs = [
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'importance' => $request->input('importance'),
            'importance_style' => $importance_style,
            'importance_icon' => $importance_icon,
            'status' => 'novo',
            'status_style' => 'info',
            'status_icon' => 'bug',
            'views' => 0
        ];

        Bug::Create($inputs);
        return Redirect::to('bugs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bug = Bug::findOrFail($id);
        $bug->views++;
        $bug->save();

        $affected   = BugAffected::where('user_id', Auth::user()->id)->count();
        $affects    = BugAffected::where('bug_id', $id)->count();

        $comments   = BugComment::where('bug_id', $id)->paginate(5);
        return view('pages.feedback.bug.show', ['bug' => $bug, 'affected' => $affected, 'affects' => $affects, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bug = Bug::findOrFail($id);
        if(Gate::allows('developer'))
        {
            $importance = $request->input('importance');
            if($importance)
            {
                $bug->importance        = $importance;
                $bug->importance_style  = $request->input('importance_style');
                $bug->importance_icon   = $request->input('importance_icon');
            }

            $status = $request->input('status');
            if($status)
            {
                $bug->status        = $status;
                $bug->status_style  = $request->input('status_style');
                $bug->status_icon   = $request->input('status_icon');
            }
            $bug->save();

            $logdata = [
                'bug_id'    => $bug->id,
                'user_id'   => Auth::user()->id,
                'type'      => ($importance) ? 0 : 1,
                'status'    => ($importance) ? $importance : $status,
                'icon'      => ($importance) ? $request->input('importance_icon') : $request->input('status_icon'),
                'style'     => ($importance) ? $request->input('importance_style') : $request->input('status_style')
            ];
            BugLog::create($logdata);
        }
        return Redirect::to('/bugs/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::allows('developer'))
        {
            Bug::findOrFail($id)->delete();
            return Redirect::to('/bugs')->with('success', true);
        }
        return Redirect::to('/bugs');
    }

    /**
     * Store a newly affected user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function affect(Request $request, $id)
    {
        $bug        = Bug::findOrFail($id);
        $user       = Auth::user();
        $affected   = BugAffected::where('bug_id', $id)->where('user_id', $user->id)->count();
        if($affected)
        {
            return Redirect::to('/bugs/'.$id)->with('error', "Você já confirmou este bug.");
        }
        BugAffected::create(['bug_id' => $id, 'user_id' => $user->id]);
        return Redirect::to('/bugs/'.$id);
    }

    /**
     * Store a newly comment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request, $id)
    {
        $bug        = Bug::findOrFail($id);
        $user       = Auth::user();
        BugComment::create(['bug_id' => $id, 'user_id' => $user->id, 'message' => $request->input('comment')]);
        return Redirect::to('/bugs/'.$id);
    }
}
