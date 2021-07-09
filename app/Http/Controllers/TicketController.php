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
        if(auth()->user()->groId == 2 || auth()->user()->groId == 1) {
            $this->authorize('viewAny', Ticket::class);
            return view('tickets',[
            'tickets' => Ticket::all()

        ]); } else {
            $this->authorize('view', Ticket::class);
            return view('tickets',[
            'tickets' => Ticket::where('useId', auth()->user()->key)->get()
            ]); 
        }
    }

    public function statistics () {

        if(auth()->user()->groId == 2 || auth()->user()->groId == 1 ) {
            $this->authorize('viewAny', Ticket::class);
            return view('dashboard',[
                'tickets' => Ticket::all(),
                'countTickets' => Ticket::count(),

                'openTickets' => Ticket::where("status", "Open")->get(),
                'countOpenTickets' => Ticket::where("status", "Open")->count(),

                'closeTickets' => Ticket::where("status", "Close")->get(),
                'countClosedTickets' => Ticket::where("status", "Close")->count()
        ]); } else {
            $this->authorize('view', Ticket::class);
            return view('dashboard',[
            'tickets' => Ticket::all(),
            'countTickets' => Ticket::where('useId', auth()->user()->key)->count(),

            'openTickets' => Ticket::where("status", "Open")->where('useId', auth()->user()->key)->get(),
            'countOpenTickets' => Ticket::where("status", "Open")->where('useId', auth()->user()->key)->count(),

            'closeTickets' => Ticket::where("status", "Close")->where('useId', auth()->user()->key)->get(),
            'countClosedTickets' => Ticket::where("status", "Close")->where('useId', auth()->user()->key)->count()

        ]); }

    }

    public function save ( Request $request ) {
        $this->authorize('create', Ticket::class);
        $ticket = Ticket::create([
            'subject' => $request->subject,
            'useId' => $request->user,
            'depId' => $request->departement, 
            'status' => 'Open',
        ]);
        
        Message::create([
            'ticId' => $ticket->id,
            'useId' => $request->user,
            'message' => $request->message,
        ]);

        if(auth()->user()->groId == 2 || auth()->user()->groId == 1) {
            $this->authorize('viewAny', Ticket::class);
            return view('tickets',[
            'tickets' => Ticket::all()

        ]); } else {
        $this->authorize('view', Ticket::class);
        return view('tickets',[
        'tickets' => Ticket::where('useId', auth()->user()->key)->get()
        ]); 
    }
    }

    public function ticketDetails(Request $request, int $id)
    {
        return view('ticketDetails', [
            'ticket' => Ticket::where( "key", $id )->first(),
            'messages' => Message::where('ticId', $id)->get(),
            'users' => User::all(),
        ]);

    }

    public function newMessage(Request $request)
    {
        $this->authorize('create', Ticket::class);
        Message::create([
            'ticId' => $request->id,
            'useId' => $request->user,
            'message' => $request->message,
        ]);

        return view('tickets',[
            'tickets' => Ticket::all(),
        ]);
    }

    public function newStatus(Request $request)
    {
        $this->authorize('update', Ticket::class);
        DB::table('tickets')
        ->where('key', $request->id)
        ->update(['status' => $request->status]);

        return view('tickets',[
            'tickets' => Ticket::all(),
        ]);
    }
}