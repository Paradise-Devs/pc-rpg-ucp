<?php

/*
 * Tickets:
 *          0 - Aberto
 *          1 - Pendente
 *          2 - Respondido
 *          3 - Fechado
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Ticket;

use Gate;

use Auth;

use Redirect;

class TicketController extends Controller
{
    public function index()
    {
        $ticket = Ticket::where('user_id', Auth::user()->id)->get();
        return view('pages.ticket.show', ['tickets' => $ticket]);
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        if(Gate::allows('creator', $ticket))
        {
            return view('pages.ticket.details_player', ['ticket' => $ticket]);
        }
        else if(Gate::allows('developer', $ticket))
        {
            return view('pages.ticket.details_admin', ['ticket' => $ticket]);
        }
        else
        {
            return Redirect::to('ticket');
        }
    }

    public function create()
    {
        return view('pages.ticket.create');
    }

    public function edit()
    {
        return view('pages.ticket.edit');
    }

    public function destroy(Request $request, $id)
    {
        if(Gate::allows('developer'))
        {
            $ticket = Ticket::findOrFail($id);
            Ticket::Destroy($id);

            return Redirect::to('ticket/manage')->with('success', true);
        }
    }

    public function store(Request $request)
    {
        return Redirect::to('ticket')->with('success', true);
    }

    public function manage()
    {
        if(Gate::allows('developer'))
        {
            $ticket = Ticket::orderBy('id', 'desc')->get();
            return view('pages.ticket.manage', ['tickets' => $ticket]);
        }
        else
        {
            return Redirect::to('ticket');
        }
    }
}
