<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Ticket;


class DashboardController extends Controller

{

    public function login ( Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        return view('dashboard',[
            'tickets' => Ticket::all(),
            'countTickets' => Ticket::count(),

            'openTickets' => Ticket::where("ticStatus", "Open")->get(),
            'countOpenTickets' => Ticket::where("ticStatus", "Open")->count(),

            'closeTickets' => Ticket::where("ticStatus", "Close")->get(),
            'countClosedTickets' => Ticket::where("ticStatus", "Close")->count()
        ]);
    }

    public function dashboard () {
        return view('dashboard',[
            'tickets' => Ticket::all(),
            'countTickets' => Ticket::count(),

            'openTickets' => Ticket::where("ticStatus", "Open")->get(),
            'countOpenTickets' => Ticket::where("ticStatus", "Open")->count(),

            'closeTickets' => Ticket::where("ticStatus", "Close")->get(),
            'countClosedTickets' => Ticket::where("ticStatus", "Close")->count()
        ]);
    }

    public function tickets () {
        return view('tickets',[
            'tickets' => Ticket::all(),
        ]);
    }

    public function knowledgebase () {
        return view('knowledgebase');
    }

    public function acp () {
        return view('acp');
    }

} ?>