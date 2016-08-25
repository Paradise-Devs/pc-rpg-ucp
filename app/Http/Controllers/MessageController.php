<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Message;

use App\Utils;

use Redirect;

use Auth;

class MessageController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $messages = Message::where('user_id', $user->id)->where('receiver_id', $user->id)->orderBy('read', 'asc')->orderBy('id', 'desc')->paginate(30);
        return view('pages.message.inbox', ['messages' => $messages]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function outbox()
    {
        $user = Auth::user();
        $messages = Message::where('user_id', $user->id)->where('creator_id', $user->id)->orderBy('read', 'asc')->orderBy('id', 'desc')->paginate(30);
        return view('pages.message.outbox', ['messages' => $messages]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $user = Auth::user();
        $messages = Message::onlyTrashed()->where('user_id', $user->id)->orderBy('read', 'asc')->orderBy('id', 'desc')->paginate(30);
        return view('pages.message.trash', ['messages' => $messages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'usuario' => 'required|exists:users,username',
            'assunto' => 'required|max:128|min:4',
            'conteudo' => 'required|min:4|max:4096'
        ]);

        $creator = Auth::user();
        $receiver_id = Utils::getUserID($request->input('usuario'));
        $inputs = [
            'user_id' => $receiver_id,
            'creator_id' => $creator->id,
            'receiver_id' => $receiver_id,
            'subject' => $request->input('assunto'),
            'content' => $request->input('conteudo'),
            'category' => 0,
            'read' => false
        ];
        Message::Create($inputs);
        $inputs = [
            'user_id' => $creator->id,
            'creator_id' => $creator->id,
            'receiver_id' => $receiver_id,
            'subject' => $request->input('assunto'),
            'content' => $request->input('conteudo'),
            'category' => 0,
            'read' => true
        ];
        Message::Create($inputs);
        return Redirect::to('message/outbox')->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('pages.message.show', ['message' => $message]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
