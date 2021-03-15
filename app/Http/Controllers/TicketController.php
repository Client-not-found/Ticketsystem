<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;


class TicketController extends Controller {
    public function newTicket () {
        return view('newTicket',[
            'users' => User::all(),
        ]);
    }

    public function tickets () {
        return view('tickets',[
            'tickets' => Ticket::all(),
        ]);
    }

    public function statistics () {
        return view('dashboard',[
            'tickets' => Ticket::all(),
            'countTickets' => Ticket::count(),

            'openTickets' => Ticket::where("ticStatus", "Open")->get(),
            'countOpenTickets' => Ticket::where("ticStatus", "Open")->count(),

            'closeTickets' => Ticket::where("ticStatus", "Close")->get(),
            'countClosedTickets' => Ticket::where("ticStatus", "Close")->count()
        ]);
    }

    public function save ( Request $request ) {
        //dd( Auth::user() );
        Ticket::create([
            'ticTopic' => $request->subject,
            'ticUseId' => $request->user,
            'ticDepartement' => $request->departement, 
            'ticStatus' => 'Open',
        ]);

        return view('tickets',[
            'tickets' => Ticket::all(),
        ]);
    }

    public function ticketDetails(Request $request, int $id)
    {

        return view('ticketDetails', [
            'ticket' => Ticket::where( "ticKey", $id )->first()
        ]);

    }
}