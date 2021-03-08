<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Ticket;


class TicketController extends Controller {
    public function newTicket () {
        return view('newTicket');
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
        //dd( $request->subject );
        Ticket::create([
            'ticTopic' => $request->ticTopic,
            'ticUseId' => 'auth()->user()->useKey',
            'ticDepartement' => $request->ticDepartement, 
            'ticStatus' => 'Open',
        ]);
    }

    public function ticketDetails(Request $request, int $id)
    {

        return view('ticketDetails', [
            'ticket' => Ticket::where( "ticKey", $id )->first()
        ]);

    }
}