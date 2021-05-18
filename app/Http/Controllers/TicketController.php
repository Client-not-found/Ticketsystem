<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Message;
use App\Models\Departement;
use Illuminate\Support\Facades\DB;


class TicketController extends Controller {
    public function newTicket () {
        return view('newTicket',[
            'users' => User::all(),
            'departements' => Departement::all(),
        ]);
    }

    public function tickets () {
        return view('tickets',[
            'tickets' => Ticket::all()//->has(Departements::class, 'mesKey', 'ticMesId'),
        ]);
    }

    public function statistics () {

        return view('dashboard',[
            'tickets' => Ticket::all(),
            'countTickets' => Ticket::where('ticUseId', '{{auth()->user()->useKey}}')->count(),

            'openTickets' => Ticket::where("ticStatus", "Open")->where('ticUseId', '{{auth()->user()->useKey}}')->get(),
            'countOpenTickets' => Ticket::where("ticStatus", "Open")->where('ticUseId', '{{auth()->user()->useKey}}')->count(),

            'closeTickets' => Ticket::where("ticStatus", "Close")->where('ticUseId', '{{auth()->user()->useKey}}')->get(),
            'countClosedTickets' => Ticket::where("ticStatus", "Close")->where('ticUseId', '{{auth()->user()->useKey}}')->count()

        ]);

        /* $this->authorize('employees', User::class);
        return view('dashboard',[
            'tickets' => Ticket::all(),
            'countTickets' => Ticket::count(),

            'openTickets' => Ticket::where("ticStatus", "Open")->get(),
            'countOpenTickets' => Ticket::where("ticStatus", "Open")->count(),

            'closeTickets' => Ticket::where("ticStatus", "Close")->get(),
            'countClosedTickets' => Ticket::where("ticStatus", "Close")->count()
        ]); */

        $this->authorize('admin', User::class);
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
        $ticket = Ticket::create([
            'ticSubject' => $request->subject,
            'ticUseId' => $request->user,
            'ticDepId' => $request->departement, 
            'ticStatus' => 'Open',
        ]);
        
        Message::create([
            'mesTicId' => $ticket->id,
            'mesUseId' => $request->user,
            'mesMessage' => $request->message,
        ]);

        return view('tickets',[
            'tickets' => Ticket::all(),
        ]);
    }

    public function ticketDetails(Request $request, int $id)
    {

        return view('ticketDetails', [
            'ticket' => Ticket::where( "ticKey", $id )->first(),
            'messages' => Message::where('mesTicId', $id)->get(),
            'users' => User::all(),
        ]);

    }

    public function newMessage(Request $request)
    {

        Message::create([
            'mesTicId' => $request->ticId,
            'mesUseId' => $request->user,
            'mesMessage' => $request->message,
        ]);

        return view('tickets',[
            'tickets' => Ticket::all(),
        ]);
    }

    public function newStatus(Request $request)
    {

        DB::table('tickets')
        ->where('ticKey', $request->ticId)
        ->update(['ticStatus' => $request->status]);

        return view('tickets',[
            'tickets' => Ticket::all(),
        ]);
    }
}