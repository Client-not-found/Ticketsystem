<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Ticket;


class TicketController extends Controller {
    public function newTicket () {
        return view('newTicket');
    }

    public function ticketDetails(Request $request, int $id)
    {

        return view('ticketDetails', [
            'ticket' => Ticket::find( $id )
        ]);

    }
}