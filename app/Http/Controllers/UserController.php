<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class UserController extends Controller
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

    public function admin() {
        return view('acp.user');
    }

    public function newUser () {
        return view('acp.newuser');
    }
}
