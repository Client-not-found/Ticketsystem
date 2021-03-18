<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Ticket;

class MessageController extends Controller
{
    public function save ( Request $request ) {
        Message::create([
            'mesTicId' => $request->ticId,
            'mesUseId' => '1',
            'mesMessage' => $request->message,
        ]);

        return view('tickets',[
            'tickets' => Ticket::all(),//->join('departements', 'tickets.ticDepId', '=' , 'departements.depKey'),
        ]);
    }
}
