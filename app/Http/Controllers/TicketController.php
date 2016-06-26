<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Ticket;

use Gate;

class TicketController extends Controller
{
    public function index()
    {
        return view('pages.ticket.show');
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
            return view('pages.ticket.manage');
        }
        else
        {
            return Redirect::to('ticket');
        }
    }
}
