<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\BlueprintComment;

use App\BlueprintVote;

use App\BlueprintLog;

use App\Blueprint;

use Redirect;

use Gate;

use Auth;

class BlueprintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blueprints = Blueprint::all();
        return view('pages.feedback.blueprint.index', ['blueprints' => $blueprints]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.feedback.blueprint.create');
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
            'status_icon' => 'file-text',
            'upvotes' => 0,
            'downvotes' => 0,
            'views' => 0
        ];

        Blueprint::Create($inputs);
        return Redirect::to('blueprints');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blueprint = Blueprint::findOrFail($id);
        $blueprint->views++;
        $blueprint->save();
        $comments = BlueprintComment::paginate(5);
        return view('pages.feedback.blueprint.show', ['blueprint' => $blueprint, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blueprint = Blueprint::findOrFail($id);
        if(Auth::user()->id == $blueprint->user->id || Gate::allows('admin'))
        {
            return view('pages.feedback.blueprint.edit', ['blueprint' => $blueprint]);
        }
        return Redirect::to('/blueprints/' . $id);
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
        $this->validate($request, [
            'title' => 'required|min:4|max:70',
            'description' => 'required|min:4'
        ]);

        $inputs = [
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ];

        Blueprint::find($id)->update($inputs);
        return Redirect::to('blueprints/'. $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_stat(Request $request, $id)
    {
        $blueprint = Blueprint::findOrFail($id);
        if(Gate::allows('developer'))
        {
            $importance = $request->input('importance');
            if($importance)
            {
                $blueprint->importance        = $importance;
                $blueprint->importance_style  = $request->input('importance_style');
                $blueprint->importance_icon   = $request->input('importance_icon');
            }

            $status = $request->input('status');
            if($status)
            {
                $blueprint->status        = $status;
                $blueprint->status_style  = $request->input('status_style');
                $blueprint->status_icon   = $request->input('status_icon');
            }
            $blueprint->save();

            $logdata = [
                'blueprint_id'    => $blueprint->id,
                'user_id'   => Auth::user()->id,
                'type'      => ($importance) ? 0 : 1,
                'status'    => ($importance) ? $importance : $status,
                'icon'      => ($importance) ? $request->input('importance_icon') : $request->input('status_icon'),
                'style'     => ($importance) ? $request->input('importance_style') : $request->input('status_style')
            ];
            BlueprintLog::create($logdata);
        }
        return Redirect::to('/blueprints/'.$id);
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
            Blueprint::findOrFail($id)->delete();
            return Redirect::to('/blueprints')->with('success', true);
        }
        return Redirect::to('/blueprints');
    }

    /**
     * Store a newly affected user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upvote(Request $request, $id)
    {
        $blueprint  = Blueprint::findOrFail($id);
        $user       = Auth::user();
        $vote       = BlueprintVote::where('blueprint_id', $id)->where('user_id', $user->id)->first();
        if($vote)
        {
            if($vote->type == 0)
            {
                return Redirect::to('/blueprints/'.$id)->with('error', "Você já votou nesta blueprint.");
            }
            else
            {
                $blueprint->downvotes--;
                $blueprint->upvotes++;
                $vote->type = 0;
                $vote->save();
                $blueprint->save();
            }
        }
        else
        {
            BlueprintVote::create(['blueprint_id' => $id, 'user_id' => $user->id, 'type' => 0]);
            $blueprint->upvotes++;
            $blueprint->save();
        }
        return Redirect::to('/blueprints/'.$id);
    }

    /**
     * Store a newly affected user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downvote(Request $request, $id)
    {
        $blueprint  = Blueprint::findOrFail($id);
        $user       = Auth::user();
        $vote       = BlueprintVote::where('blueprint_id', $id)->where('user_id', $user->id)->first();
        if($vote)
        {
            if($vote->type == 1)
            {
                return Redirect::to('/blueprints/'.$id)->with('error', "Você já votou nesta blueprint.");
            }
            else
            {
                $blueprint->upvotes--;
                $blueprint->downvotes++;
                $vote->type = 1;
                $vote->save();
                $blueprint->save();
            }
        }
        else
        {
            BlueprintVote::create(['blueprint_id' => $id, 'user_id' => $user->id, 'type' => 1]);
            $blueprint->downvotes++;
            $blueprint->save();
        }
        return Redirect::to('/blueprints/'.$id);
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
        $bp         = Blueprint::findOrFail($id);
        $user       = Auth::user();
        BlueprintComment::create(['blueprint_id' => $id, 'user_id' => $user->id, 'message' => $request->input('comment')]);
        return Redirect::to('/blueprints/'.$id);
    }
}
